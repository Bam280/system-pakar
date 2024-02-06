<?php

namespace App\Http\Controllers;

use App\Models\IIV;
use Illuminate\Http\Request;

class DiagnoseFormController extends Controller
{
    public function index()
    {
        return view('diagnose.form.index');
    }

    public function form1()
    {
        return view('diagnose.form.form1');
    }

    public function form1Store(Request $request)
    {
        $data = $request->validate([
            'nama_sistem' => 'required',
            'deskripsi_sistem' => 'required',

            'kesamaan_sistem' => 'nullable|boolean',
        ]);

        session()->put('diagnose_data', [
            'form1' => $data,
        ]);

        if (isset($data['kesamaan_sistem']) && $data['kesamaan_sistem']) {
            return to_route('diagnose.form.form4');
        }

        return to_route('diagnose.form.form2');
    }

    public function form2()
    {
        $all_iiv = IIV::all();
        return view('diagnose.form.form2', compact('all_iiv'));
    }

    public function form2Store(Request $request)
    {
        $data = $request->validate([
            'sistem_terhubung_lan' => 'required|array',
            'sistem_terhubung_lan.*' => 'required|string',

            'sistem_berbagi_database' => 'required|array',
            'sistem_berbagi_database.*' => 'required|string',

            'sistem_memiliki_hardware_sama' => 'required|array',
            'sistem_memiliki_hardware_sama.*' => 'required|string',
        ]);

        $data['poin_sistem'] = [];

        foreach ($data['sistem_terhubung_lan'] as $value) {
            if (empty($data['poin_sistem'][$value])) {
                $data['poin_sistem'][$value] = 0;
            }
            $data['poin_sistem'][$value] += 2;
        }

        foreach ($data['sistem_berbagi_database'] as $value) {
            if (empty($data['poin_sistem'][$value])) {
                $data['poin_sistem'][$value] = 0;
            }
            $data['poin_sistem'][$value] += 1;
        }

        foreach ($data['sistem_memiliki_hardware_sama'] as $value) {
            if (empty($data['poin_sistem'][$value])) {
                $data['poin_sistem'][$value] = 0;
            }
            $data['poin_sistem'][$value] += 2;
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
        return view('diagnose.form.form3');
    }

    public function form3Store(Request $request)
    {
        $data = $request->validate([
            'deskripsi_risiko' => 'required|string',
            'deskripsi_kemungkinan' => 'required|string',
            'nilai_kemungkinan' => 'required|numeric|min:0|max:5',
            'deskripsi_dampak_organisasi' => 'required|string',
            'nilai_dampak_organisasi' => 'required|numeric|min:0|max:5',
            'deskripsi_dampak_nasional' => 'required|string',
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
        $iiv = IIV::whereIn('nama', session('diagnose_data')['sistem_terpilih'])->get();
        return view('diagnose.form.result', [
            'iiv' => $iiv,
            'diagnose_data' => session('diagnose_data')
        ]);
    }
}