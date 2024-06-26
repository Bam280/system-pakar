<?php

namespace App\Http\Controllers;

use App\Models\IIV;
use App\Models\Interdepen;
use App\Models\RefInterdepen;
use App\Models\RefJenisTatakelola;
use App\Models\SumberDaya;
use App\Models\TataKelola;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        $allRefInterdepen = RefInterdepen::all();
        $all_iiv = IIV::all();
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
        ]);

        $nilai_dampak = $data['nilai_dampak_organisasi'] + $data['nilai_dampak_nasional'] / 2;
        $data['nilai_risiko'] = $data['nilai_kemungkinan'] * $nilai_dampak;

        // get closest nilai_risiko at iiv
        
        // Mencari nilai risiko terdekat
        // $nilai_risiko_terdekat = INF;
        // $sistem_terdekat = null;
        // $nilai_risiko_target = $data['nilai_risiko'];

        // foreach (session('diagnose_data')['form2']['poin_sistem'] as $sistem => $nilai_risiko) {
        //     $selisih_risiko = abs($nilai_risiko_target - $nilai_risiko);
        //     if ($selisih_risiko < $nilai_risiko_terdekat) {
        //         $nilai_risiko_terdekat = $selisih_risiko;
        //         $sistem_terdekat = $sistem;
        //     }
        // }

        $iiv1 = IIV::whereIn('nama', array_keys(session('diagnose_data')['form2']['poin_sistem']))->where('nilai_risiko', '>=', $data['nilai_risiko'])->orderBy('nilai_risiko', 'asc')->limit(1)->get();
        $iiv2 = IIV::whereIn('nama', array_keys(session('diagnose_data')['form2']['poin_sistem']))->where('nilai_risiko', '<', $data['nilai_risiko'])->orderBy('nilai_risiko', 'desc')->limit(1)->get();
        
        $iiv = $iiv1->merge($iiv2);

        $sistem_terpilih = $iiv->pluck('nama')->toArray();
        
        $data = [
            ...session('diagnose_data'),
            'form3' => $data,
            'sistem_terpilih' => $sistem_terpilih,
        ];
        
        session()->put('diagnose_data', $data);
        return to_route('diagnose.form.result');

    }

    public function form4()
    {
        $allTatakelola = RefJenisTatakelola::all();
        $data_form4 = session('diagnose_data')['form4'] ?? [];
        return view('diagnose.form.form4', compact('allTatakelola', 'data_form4'));
    }

    public function form4store(Request $request)
    {
        $data=$request->validate([
            //sumberdaya
            'kriteria_pendanaan_pengamanan' => 'nullable|array',
            'kriteria_pendanaan_pemulihan' => 'nullable|array',
            'kriteria_pendanaan_pendukung' => 'nullable|array',
            'kriteria_keterampilan_pengamanan' => 'nullable|array',
            'kriteria_keterampilan_identifikasi' => 'nullable|array',
            'kesadaran_interdepen' => 'nullable|array',
            'kriteria_kesadaran_risiko' => 'nullable|array',
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

        if(!empty($data['kriteria_pendanaan_pengamanan'])) {
            foreach ($data['kriteria_pendanaan_pengamanan'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 2;
            }
        }

        if(!empty($data['kriteria_pendanaan_pemulihan'])) {
            foreach ($data['kriteria_pendanaan_pemulihan'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 2;
            }
        }

        if(!empty($data['kriteria_pendanaan_pendukung'])) {
            foreach ($data['kriteria_pendanaan_pendukung'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 4;
            }
        }

        if(!empty($data['kriteria_keterampilan_pengamanan'])) {
            foreach ($data['kriteria_keterampilan_pengamanan'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 3;
            }
        }

        if(!empty($data['kriteria_keterampilan_identifikasi'])) {
            foreach ($data['kriteria_keterampilan_identifikasi'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 7;
            }
        }

        if(!empty($data['kesadaran_interdepen'])) {
            foreach ($data['kesadaran_interdepen'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 4;
            }
        }

        if(!empty($data['kriteria_kesadaran_risiko'])) {
            foreach ($data['kriteria_kesadaran_risiko'] as $value) {
                if (empty($data['poin_sistem_tatakelola'][$value])) {
                    $data['poin_sistem_tatakelola'][$value] = 0;
                }
                $data['poin_sistem_tatakelola'][$value] += 3;
            }
        }

        //sumberdaya

        if(!empty($data['regulasi_tujuan'])) {
            foreach ($data['regulasi_tujuan'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 1;
            }
        }

        if(!empty($data['regulasi_fungsi'])) {
            foreach ($data['regulasi_fungsi'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 3;
            }
        }

        if(!empty($data['regulasi_risiko'])) {
            foreach ($data['regulasi_risiko'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 1;
            }
        }

        if(!empty($data['standar_fungsi'])) {
            foreach ($data['standar_fungsi'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 1;
            }
        }

        if(!empty($data['standar_aplikasi'])) {
            foreach ($data['standar_aplikasi'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 2;
            }
        }

        if(!empty($data['alur_tujuan'])) {
            foreach ($data['alur_tujuan'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 4;
            }
        }

        if(!empty($data['alur_fungsi'])) {
            foreach ($data['alur_fungsi'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 3;
            }
        }

        if(!empty($data['alur_risiko'])) {
            foreach ($data['alur_risiko'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 2;
            }
        }

        if(!empty($data['alur_aplikasi'])) {
            foreach ($data['alur_aplikasi'] as $value) {
                if (empty($data['poin_sistem_sumberdaya'][$value])) {
                    $data['poin_sistem_sumberdaya'][$value] = 0;
                }
                $data['poin_sistem_sumberdaya'][$value] += 2;
            }
        }

        //get max poin antar sistem
        $poin_order_tatakelola = [];
        $poin_order_sumberdaya = [];

        foreach ($data['poin_sistem_tatakelola'] as $key => $value) {
            if (empty($poin_order_tatakelola[$value])) {
                $poin_order_tatakelola[$value] = [
                    'sistem' => [],
                    'poin' => $value,
                ];
            }
            $poin_order_tatakelola[$value]['sistem'][] = $key;
        }

        foreach ($data['poin_sistem_sumberdaya'] as $key => $value) {
            if (empty($poin_order_sumberdaya[$value])) {
                $poin_order_sumberdaya[$value] = [
                    'sistem' => [],
                    'poin' => $value,
                ];
            }
            $poin_order_sumberdaya[$value]['sistem'][] = $key;
        }

        krsort($poin_order_tatakelola);
        krsort($poin_order_sumberdaya);

        $data['poin_order_tatakelola'] = $poin_order_tatakelola;
        $data['poin_order_sumberdaya'] = $poin_order_sumberdaya;

        $max_tatakelola = $poin_order_tatakelola[array_key_first($poin_order_tatakelola)];
        $max_sumberdaya = $poin_order_sumberdaya[array_key_first($poin_order_sumberdaya)];

        $nilai_total = $max_tatakelola['poin'] + $max_sumberdaya['poin'];
        
        
        $data = [
            ...session('diagnose_data'),
            'form4' => $data,
        ];
        
        
        $data['kriteria_terpilih'] = [$max_tatakelola['sistem'][0], $max_sumberdaya['sistem'][0]];
        $data['nilai_total'] = $nilai_total;

        dd($data);
        session()->put('diagnose_data', $data);
        return to_route('diagnose.form.result');

    }

    public function result()
    {        
        $iiv = IIV::with('refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();


        $session_data = session('diagnose_data');
        // dd($session_data);

        IIV::FirstOrCreate([
            'nama' => $session_data['form1']['nama_sistem'],
            'deskripsi_sistem' => $session_data['form1']['deskripsi_sistem'],
            'ref_instansi_id' => Auth::user()->instansi_ref,
            'user_id' => Auth::user()->id,
            'nilai_risiko' => 0.0,
        ]);

        if (isset($session_data['form2']['poin_sistem'])) {
            foreach ($session_data['form2']['poin_sistem'] as $key => $value) {
                if(!IIV::where('nama', $key)->exists()) {
                    IIV::FirstOrCreate([
                        'nama' => $key,
                        'deskripsi_sistem' => $session_data['form1']['deskripsi_sistem'],
                        'ref_instansi_id' => Auth::user()->instansi_ref,
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

        return view('diagnose.form.result', [
            'iiv' => $iiv,
            'diagnose_data' => session('diagnose_data'),
        ]);
    }

    public function result2()
    {
        $iivs = IIV::with('sumberdaya','tatakelola','tujuan','refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();

        // flatten $iiv->interdepenSistemIIV->sistemElektronik n als0 $iiv data 

        $sistem_terpilih = $iivs->pluck('id')->toArray();
        $sistem_terpilih = array_merge($sistem_terpilih, $iivs->pluck('interdepenSistemIIV')->flatten()->pluck('sistemElektronik')->flatten()->pluck('id')->toArray());
        $sistem_terpilih = IIV::with(['tujuan', 'tujuan.refTujuan', 'tujuan.risiko', 'tujuan.risiko.kendali', 'tujuan.risiko.kendali.refFungsi'])->whereIn('id', $sistem_terpilih)->get();  
        // $sistem_terpilih = IIV::with(['sumberdaya'])->whereIn('id', $sistem_terpilih->pluck('id')->toArray())->get();
        $session_data = session('diagnose_data');
        // $interp = Interdepen::with('sistemElektronik', 'sistemIIV', 'sistemElektronik.interdepenSistemIIV')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();
        // $detail_interp = $interp->pluck('sistemElektronik')->toArray();
        // $detail_interp = array_merge($detail_interp, $interp->pluck('sistemElektronik')->toArray());
        // dd ($detail_interp);
        $check = session('diagnose_data');
        // dd($sistem_terpilih);

        return view('diagnose.form.result2',[
            'iivs' => $iivs,
            'sistem_terpilih' => $sistem_terpilih,
            'diagnose_data' => session('diagnose_data')
        ]);
    }

    public function print()
    {
        $name = session('diagnose_data')['form1']['nama_sistem'];
        $date = date('Y-m-d');
        $iivs = IIV::with('tujuan','refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();

        $sistem_terpilih = $iivs->pluck('id')->toArray();
        $sistem_terpilih = array_merge($sistem_terpilih, $iivs->pluck('interdepenSistemIIV')->flatten()->pluck('sistemElektronik')->flatten()->pluck('id')->toArray());
        $sistem_terpilih = IIV::with(['tujuan', 'tujuan.refTujuan', 'tujuan.risiko', 'tujuan.risiko.kendali', 'tujuan.risiko.kendali.refFungsi'])->whereIn('id', $sistem_terpilih)->get(); 
        
        // $sumberdaya = IIV::with('sumberdaya')->whereIn('id', $sistem_terpilih->pluck('id')->toArray())->get();
        // $tataKelola = IIV::with('tataKelola')->whereIn('id', $sistem_terpilih->pluck('id')->toArray())->get();
        $session_data = session('diagnose_data');
        
        $pdf = FacadePdf::loadview('diagnose.cetak.index',[
            'iivs' => $iivs,
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
