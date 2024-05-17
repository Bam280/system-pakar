<?php

namespace App\Http\Controllers;

use App\Models\IIV;
use App\Models\Interdepen;
use App\Models\RefInterdepen;
use App\Models\RefJenisTatakelola;
use App\Models\ResultHistory;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use PDF;

class DiagnoseFormController extends Controller
{
    public function index()
    {
        return view('diagnose.form.index');
    }

    public function form1()
    {
        $data_form1 = session('diagnose_data')['form1'] ?? [];

        return view('diagnose.form.form1', compact('data_form1'));
    }

    public function form1Store(Request $request)
    {
        $data = $request->validate([
            'nama_sistem' => 'required',
            'deskripsi_sistem' => 'required',
            'kesamaan_sistem' => 'nullable',
        ], [
            'nama_sistem.required' => 'Mohon untuk tidak mengosongkan nama sistem yang akan anda Diagnose.',
            'deskripsi_sistem.required' => 'Mohon untuk tidak mengosongkan deskripsi sistem yang akan anda Diagnose.',
        ]);

        session()->put('diagnose_data', [
            'form1' => $data,
        ]);

        if (isset($data['kesamaan_sistem']) && $data['kesamaan_sistem']) {
            return to_route('diagnose.form.form2');
        }

        // return 'not yet implemented';
        return to_route('diagnose.form.form4');
    }

    public function form2()
    {
        $all_iiv = IIV::all();
        $allRefInterdepen = RefInterdepen::all();
        $data_form2 = session('diagnose_data')['form2'] ?? [];
        return view('diagnose.form.form2', compact('all_iiv', 'data_form2', 'allRefInterdepen'));
    }

    public function form2Store(Request $request)
    {
        $allRefInterdepen = RefInterdepen::all();

        $formValidation = [];
        foreach ($allRefInterdepen as $refInterdepen) {
            $slug = Str::slug($refInterdepen->label, '_');
            $formValidation[$slug] = 'nullable|array';
            $formValidation[$slug . '.*'] = 'nullable|string';
        }

        $data = $request->validate([
            ...$formValidation,
        ]);

        $data['poin_sistem'] = [];
        $data['sistem_pilihan'] = [];

        foreach ($allRefInterdepen as $refInterdepen) {
            $slug = Str::slug($refInterdepen->label, '_');
            if (!empty($data[$slug])) {
                foreach ($data[$slug] as $value) {
                    if (empty($data['poin_sistem'][$value])) {
                        $data['poin_sistem'][$value] = 0;
                    }
                    if(empty($data['sistem_pilihan'][$value])) {
                        $data['sistem_pilihan'][$value] = [];
                    }
                    $data['sistem_pilihan'][$value][] = $refInterdepen->label;
                    $data['poin_sistem'][$value] += $refInterdepen->poin;
                }
            }
        }

        // get max poin key value
        $poin_order = [];

        // order by poin n insert the same poin to array sistem
        foreach ($data['poin_sistem'] as $key => $value) {
            if (empty($poin_order[$value])) {
                $poin_order[$value] = [
                    'sistem' => [],
                    'poin' => $value,
                ];
            }
            $poin_order[$value]['sistem'][] = $key;
        }

        krsort($poin_order);
        $data['poin_order'] = $poin_order;

        $max = $poin_order[array_key_first($poin_order)];

        $data = [
            ...session('diagnose_data'),
            'form2' => $data,
        ];
        
        if (count($max['sistem']) == 1) {
            $data['sistem_terpilih'] = [$max['sistem'][0]];
            
            session()->put('diagnose_data', $data);
            return to_route('diagnose.form.result');
        }
        

        session()->put('diagnose_data', $data);
        return to_route('diagnose.form.form3');
    }

    public function form3()
    {
        // dd ($data = session('diagnose_data'));
        $data_form3 = session('diagnose_data')['form3'] ?? [];
        return view('diagnose.form.form3', compact('data_form3'), ['diagnose_data' => session('diagnose_data')]);
    }

    public function form3Store(Request $request)
    {
        
        $data = $request->validate([
            'nilai_kemungkinan' => 'required|numeric|min:0|max:5',
            'nilai_dampak_organisasi' => 'required|numeric|min:0|max:5',
            'nilai_dampak_nasional' => 'required|numeric|min:0|max:5',
        ], [
            'nilai_kemungkinan.required' => 'Mohon untuk tidak mengosongkan nilai kemungkinan.',
            'nilai_dampak_organisasi.required' => 'Mohon untuk tidak mengosongkan nilai dampak organisasi.',
            'nilai_dampak_nasional.required' => 'Mohon untuk tidak mengosongkan nilai dampak nasional.',
        ]);

        $nilai_dampak = $data['nilai_dampak_organisasi'] + $data['nilai_dampak_nasional'] / 2;
        $data['nilai_risiko'] = $data['nilai_kemungkinan'] * $nilai_dampak;

        $iiv1 = IIV::whereIn('nama', array_keys(session('diagnose_data')['form2']['poin_sistem']))->where('nilai_risiko', '>=', $data['nilai_risiko'])->orderBy('nilai_risiko', 'asc')->limit(1)->get();
        $iiv2 = IIV::whereIn('nama', array_keys(session('diagnose_data')['form2']['poin_sistem']))->where('nilai_risiko', '<', $data['nilai_risiko'])->orderBy('nilai_risiko', 'desc')->limit(1)->get();

        $iiv = $iiv1->merge($iiv2);

        $sistem_terpilih = $iiv->pluck('nama')->take(1)->toArray();
        
        $data = [
            ...session('diagnose_data'),
            'form3' => $data,
            'sistem_terpilih' => $sistem_terpilih,
        ];
        // dd ($data);
        
        session()->put('diagnose_data', $data);
        return to_route('diagnose.form.result');

    }

    public function form4()
    {
        $all_tatakelola = RefJenisTatakelola::all();
        $data_form4 = session('diagnose_data')['form4'] ?? [];
        return view('diagnose.form.form4', compact('all_tatakelola', 'data_form4'));
    }

    public function form4store(Request $request)
    {
        $data=$request->validate([
            //sumberdaya
            'kriteria_pendanaan_pengamanan' => 'nullable',
            'kriteria_pendanaan_pemulihan' => 'nullable',
            'kriteria_pendanaan_pendukung' => 'nullable',
            'kriteria_keterampilan_pengamanan' => 'nullable',
            'kriteria_keterampilan_identifikasi' => 'nullable',
            'kesadaran_interdepen' => 'nullable',
            'kriteria_kesadaran_risiko' => 'nullable',
            //tatakelola
            'regulasi_tujuan' => 'nullable|array',
            'regulasi_fungsi' => 'nullable|array',
            'regulasi_risiko' => 'nullable|array',
            'standar_fungsi' => 'nullable|array',
            'standar_aplikasi' => 'nullable|array',
            'alur_tujuan' => 'nullable|array',
            'alur_fungsi' => 'nullable|array',
            'alur_risiko' => 'nullable|array',
            'alur_aplikasi' => 'nullable|array',
        ]);
        

        $data['poin_sistem_tatakelola']=[];
        $data['poin_sistem_sumberdaya']=[];

        $poin_dasar = ['Lokal' => 1, 'Nasional' => 2, 'Internasional' => 3];

        // Function to process each funding type with different multipliers
        function processFundingType($data, &$poin_sistem_tatakelola, $kriteria, $multiplier, $poin_dasar) {
            if (!empty($data[$kriteria])) {
                foreach ($data[$kriteria] as $value) {
                    // Check if the base value exists in the base points array, if not use 0
                    $baseValue = isset($poin_dasar[$value]) ? $poin_dasar[$value] : 0;

                    // Calculate the points to add
                    $pointsToAdd = $baseValue * $multiplier;

                    // Initialize or update the points in the management system
                    if (empty($poin_sistem_tatakelola[$value])) {
                        $poin_sistem_tatakelola[$value] = 0;
                    }
                    $poin_sistem_tatakelola[$value] += $pointsToAdd;
                }
            }
        }

        processFundingType($data, $data['poin_sistem_tatakelola'], 'regulasi_tujuan', 1, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'regulasi_fungsi', 3, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'regulasi_risiko', 1, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'standar_fungsi', 1, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'standar_aplikasi', 2, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'alur_tujuan', 4, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'alur_fungsi', 3, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'alur_risiko', 2, $poin_dasar);
        processFundingType($data, $data['poin_sistem_tatakelola'], 'alur_aplikasi', 2, $poin_dasar);


        // Function to handle the addition of points based on radio button input
        function processFundingTypeWithRadioButtons($data, &$poin_sistem_sumberdaya, $category, $multiplier) {
            if (!empty($data[$category])) {
                $poin_sistem_sumberdaya[$category] = $multiplier;
            }
        }

        // Process each category with the specified multiplier
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kriteria_pendanaan_pengamanan', 2);
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kriteria_pendanaan_pendukung', 4);
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kriteria_pendanaan_risiko', 2);
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kriteria_keterampilan_penanganan', 3);
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kriteria_keterampilan_identifikasi', 7);
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kesadaran_interdepen', 4);
        processFundingTypeWithRadioButtons($data, $data['poin_sistem_sumberdaya'], 'kriteria_kesadaran_risiko', 3);

        
        $totalPoinTatakelola = array_sum($data['poin_sistem_tatakelola']);
        $totalPoinSumberdaya = array_sum($data['poin_sistem_sumberdaya']);
        $data['nilai_total'] = $totalPoinTatakelola + $totalPoinSumberdaya;
        
        $data['total_poin_tatakelola'] = $totalPoinTatakelola;
        $data['total_poin_sumberdaya'] = $totalPoinSumberdaya;

        $iiv1 = IIV::where('nilai_kemiripan', '>=', $data['nilai_total'])->orderBy('nilai_kemiripan', 'asc')->limit(1)->get();
        $iiv2 = IIV::where('nilai_kemiripan', '<', $data['nilai_total'])->orderBy('nilai_kemiripan', 'desc')->limit(1)->get();

        // Gabungkan dan ambil nilai kemiripan
        $iiv = $iiv1->concat($iiv2);

        // Cek entri mana yang lebih dekat dengan nilai_total
        $closest = $iiv->sortBy(function ($item) use ($data) {
            return abs($item->nilai_kemiripan - $data['nilai_total']);
        })->first();

        // Ambil nama dari entri yang paling dekat
        $sistem_terpilih = collect([$closest->nama])->toArray();
        // $data['kriteria_terpilih'] = [$max_tatakelola['sistem'][0], $max_sumberdaya['sistem'][0]];
        
        $data = [
            ...session('diagnose_data'),
            'form4' => $data,
            'sistem_terpilih' => $sistem_terpilih,
        ];
        // dd ($data);
        session()->put('diagnose_data', $data);
        return to_route('diagnose.form.result');

    }

    public function result()
    {        
        // dd (session('diagnose_data'));
        $iiv = IIV::with('refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();

        $session_data = session('diagnose_data');

        if (!empty($session_data['form1']) && !empty($session_data['form2'])){
            IIV::FirstOrCreate([
                'nama' => $session_data['form1']['nama_sistem'],
                'deskripsi_sistem' => $session_data['form1']['deskripsi_sistem'],
                'ref_instansi_id' => Auth::user()->ref_instansi_id,
                'user_id' => Auth::user()->id,
                'nilai_risiko' => 0.0,
            ]);
        }

        if (!empty($session_data['form2'])){
            if (isset($session_data['form2']['poin_sistem'])) {
                foreach ($session_data['form2']['poin_sistem'] as $key => $value) {
                    if(!IIV::where('nama', $key)->exists()) {
                        IIV::FirstOrCreate([
                            'nama' => $key,
                            'deskripsi_sistem' => $session_data['form1']['deskripsi_sistem'],
                            'ref_instansi_id' => Auth::user()->ref_instansi_id,
                            'user_id' => Auth::user()->id,
                            'nilai_risiko' => 0.0,
                        ]);
                    }
                }
            }

            foreach ($session_data['sistem_terpilih'] as $sistem_terpilih) {
                foreach ($session_data['form2']['sistem_pilihan'][$sistem_terpilih] as $sistem_pilihan) {
                    Interdepen::FirstOrCreate([
                        'ref_interdepen_id' => RefInterdepen::where('label', $sistem_pilihan)->first()->id,
                        'sistem_elektronik_id' => IIV::where('nama', $session_data['form1']['nama_sistem'])->first()->id,
                        'sistem_iiv_id' => IIV::where('nama', $sistem_terpilih)->first()->id,
                        'deskripsi_interdepen' => "",
                    ]);
                }
            }
        }

        $latest_history = ResultHistory::where('user_id', Auth::user()->id)->latest()->first();

        // if (json_encode($latest_history->attributes) == json_encode($session_data)) {
        //     $latest_history->update([
        //         'attributes' => $session_data,
        //     ]);
        // } else {
        //     ResultHistory::create([
        //         'attributes' => $session_data,
        //         'user_id' => Auth::user()->id,
        //     ]);
        // }

        ResultHistory::createOrUpdate([
            'attributes' => $session_data,
            'user_id' => Auth::user()->id,
        ]);

        


        return view('diagnose.form.result', [
            'iiv' => $iiv,
            'diagnose_data' => session('diagnose_data'),
        ]);
        
    }

    public function result2()
    {
        
        $iiv = IIV::with('refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();
        

        $sistem_terpilih = $iiv->pluck('id')->toArray();
        $sistem_terpilih = array_merge($sistem_terpilih, $iiv->pluck('interdepenSistemIIV')->flatten()->pluck('sistemElektronik')->flatten()->pluck('id')->toArray());
        $sistem_terpilih = IIV::with(['tujuan', 'tujuan.refTujuan', 'tujuan.risiko', 'tujuan.risiko.kendali', 'tujuan.risiko.kendali.refFungsi', 'sumberdaya'])->whereIn('id', $sistem_terpilih)->get();  
        // $sistem_terpilih = IIV::with(['sumberdaya'])->whereIn('id', $sistem_terpilih->pluck('id')->toArray())->get();
        $session_data = session('diagnose_data');
        // dd($session_data);
       

        return view('diagnose.form.result2',[
            'iiv' => $iiv,
            'sistem_terpilih' => $sistem_terpilih,
            'diagnose_data' => session('diagnose_data')
        ]);
    }

    public function print()
    {
        $name = session('diagnose_data')['form1']['nama_sistem'];
        $date = date('Y-m-d');
        $iiv = IIV::with('refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();

        $sistem_terpilih = $iiv->pluck('id')->toArray();
        $sistem_terpilih = array_merge($sistem_terpilih, $iiv->pluck('interdepenSistemIIV')->flatten()->pluck('sistemElektronik')->flatten()->pluck('id')->toArray());
        $sistem_terpilih = IIV::with(['tujuan', 'tujuan.refTujuan', 'tujuan.risiko', 'tujuan.risiko.kendali', 'tujuan.risiko.kendali.refFungsi'])->whereIn('id', $sistem_terpilih)->get(); 
        
        $session_data = session('diagnose_data');
        
        $pdf = FacadePdf::loadview('diagnose.cetak.index',[
            'iiv' => $iiv,
            'sistem_terpilih' => $sistem_terpilih,
            'diagnose_data' => session('diagnose_data')]);
        return $pdf->stream($name . $date . '.pdf');
    }

    public function reset()
    {
        session()->forget('diagnose_data');
        return to_route('diagnose.form.form1');
    }
}
