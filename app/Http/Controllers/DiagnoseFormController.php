<?php

namespace App\Http\Controllers;

use App\Models\IIV;
use App\Models\Interdepen;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
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
        $data_form2 = session('diagnose_data')['form2'] ?? [];
        return view('diagnose.form.form2', compact('all_iiv', 'data_form2'));
    }

    public function form2Store(Request $request)
    {
        $data = $request->validate([
            'sistem_terhubung_lan' => 'nullable|array',
            'sistem_terhubung_lan.*' => 'nullable|string',

            'sistem_berbagi_database' => 'nullable|array',
            'sistem_berbagi_database.*' => 'nullable|string',

            'sistem_memiliki_hardware_sama' => 'nullable|array',
            'sistem_memiliki_hardware_sama.*' => 'nullable|string',
        ]);

        $data['poin_sistem'] = [];

        if(!empty($data['sistem_terhubung_lan'])) {
            foreach ($data['sistem_terhubung_lan'] as $value) {
                if (empty($data['poin_sistem'][$value])) {
                    $data['poin_sistem'][$value] = 0;
                }
                $data['poin_sistem'][$value] += 2;
            }
        }

        if(!empty($data['sistem_berbagi_database'])) {
            foreach ($data['sistem_berbagi_database'] as $value) {
                if (empty($data['poin_sistem'][$value])) {
                    $data['poin_sistem'][$value] = 0;
                }
                $data['poin_sistem'][$value] += 2;
            }
        }

        if(!empty($data['sistem_memiliki_hardware_sama'])) {
            foreach ($data['sistem_memiliki_hardware_sama'] as $value) {
                if (empty($data['poin_sistem'][$value])) {
                    $data['poin_sistem'][$value] = 0;
                }
                $data['poin_sistem'][$value] += 1;
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
        $iiv1 = IIV::where('nilai_risiko', '>=', $data['nilai_risiko'])->orderBy('nilai_risiko', 'asc')->limit(1)->get();
        $iiv2 = IIV::where('nilai_risiko', '<', $data['nilai_risiko'])->orderBy('nilai_risiko', 'desc')->limit(1)->get();

        
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
        return view('diagnose.form.form4');
    }

    public function result()
    {        
        $iiv = IIV::with('refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();

        $session_data = session('diagnose_data');
        dd($session_data);

        IIV::FirstOrCreate([
            'nama' => $session_data['form1']['nama_sistem'],
            'deskripsi_sistem' => $session_data['form1']['deskripsi_sistem'],
            'user_id' => Auth::user()->id,
            'nilai_risiko' => 0.0,
        ]);

        if (isset($session_data['form2']['poin_sistem'])) {
            foreach ($session_data['form2']['poin_sistem'] as $key => $value) {
                if(!IIV::where('nama', $key)->exists()) {
                    IIV::FirstOrCreate([
                        'nama' => $key,
                        'user_id' => Auth::user()->id,
                        'nilai_risiko' => 0.0,
                    ]);
                }
            }
        }

        Interdepen::FirstOrCreate([
            'ref_interdepen_id' => 1,
            'sistem_elektronik_id' => IIV::where('nama', $session_data['form1']['nama_sistem'])->first()->id,
            'sistem_iiv_id' => IIV::where('nama', $session_data['form2']['poin_order'][array_key_first($session_data['form2']['poin_order'])]['sistem'][0])->first()->id,
            'deskripsi_interdepen' => "",
        ]);

        return view('diagnose.form.result', [
            'iiv' => $iiv,
            'diagnose_data' => session('diagnose_data'),
        ]);
    }

    public function result2()
    {
        $iiv = IIV::with('refInstansi', 'interdepenSistemIIV', 'interdepenSistemIIV.sistemElektronik')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();


        // flatten $iiv->interdepenSistemIIV->sistemElektronik n als0 $iiv data 

        $sistem_terpilih = $iiv->pluck('id')->toArray();
        $sistem_terpilih = array_merge($sistem_terpilih, $iiv->pluck('interdepenSistemIIV')->flatten()->pluck('sistemElektronik')->flatten()->pluck('id')->toArray());
        $sistem_terpilih = IIV::with(['tujuan', 'tujuan.refTujuan', 'tujuan.risiko', 'tujuan.risiko.kendali', 'tujuan.risiko.kendali.refFungsi'])->whereIn('id', $sistem_terpilih)->get();  
        $session_data = session('diagnose_data');
        // $interp = Interdepen::with('sistemElektronik', 'sistemIIV', 'sistemElektronik.interdepenSistemIIV')->whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();
        // $detail_interp = $interp->pluck('sistemElektronik')->toArray();
        // $detail_interp = array_merge($detail_interp, $interp->pluck('sistemElektronik')->toArray());
        // dd ($detail_interp);

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
        // $sumberdaya = IIV::with('sumberdaya')->whereIn('id', $sistem_terpilih->pluck('id')->toArray())->get();
        // $tataKelola = IIV::with('tataKelola')->whereIn('id', $sistem_terpilih->pluck('id')->toArray())->get();
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
