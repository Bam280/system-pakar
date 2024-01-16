<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Diagnose;
use App\Models\tb_iiv;
use Illuminate\Http\Request;
use DB;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.diagnose.index');
    }

    public function fetch(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('nilai')
                ->where('title', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
            foreach($data as $row)
            {
                // $g = strpos($row->title, $query);
                // $output .= '
                // <li style="word-wrap: break-word;">'.substr($row->title, $g, 50).'. . .</li>
                // ';
                $highlightedTitle = preg_replace("/($query)/i", '<strong>$1</strong>', $row->title); // Highlight the matched part
                $output .= '<li class="dropdown-item" style="word-wrap: break-word; white-space: normal; overflow: hidden; text-overflow: ellipsis;">'.$highlightedTitle.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Diagnose::create([
        //     $request->'sistem1',
        //     $request->'sistem2',
        //     $request->'sistem3'])

        
        $data = [];
        foreach ($request->sistem1 as $k => $v) {
            if(empty($data[$v])){
                $data[$v] = 2;
            } else {
                $data[$v] += 2;
            }
        }
        foreach ($request->sistem2 as $k => $v) {
            if(empty($data[$v])){
                $data[$v] = 1;
            } else {
                $data[$v] += 1;
            }
        }
        foreach ($request->sistem3 as $k => $v) {
            if(empty($data[$v])){
                $data[$v] = 2;
            } else {
                $data[$v] += 2;
            }
        }
        $maxKey = null;
        $maxValue = null;
        
        foreach ($data as $key => $value) {
            if ($maxValue === null || $value > $maxValue) {
                $maxKey = $key;
                $maxValue = $value;
            }
        }
        
        // Sekarang $maxKey dan $maxValue berisi key dan value yang memiliki nilai terbesar
        // echo "Key terbesar: " . $maxKey . "<br>";
        // echo "Value terbesar: " . $maxValue . "<br>";

        // $Store1 = tb_iiv::create('Nama_IIV', $maxKey);
        // if (tb_iiv::where('Nama_IIV', $maxKey)->exists()) {
        //     $id_iiv = tb_iiv::where('Nama_IIV', $maxKey)->first()->Id_IIV;
        // } else {
        //     $id_iiv = tb_iiv::max('Id_IIV') + 1;
        // }

        $p = "Risk-";
        for ($i = 0; $i < 5; $i++) {
            $p .= rand(0, 9);
        }
        

        $store1 = tb_iiv::create([
            'Nama_IIV' => $maxKey
        ]);

        $store2 = Diagnose::create([
            'Id_Tujuan' => $p,
            'Deskripsi_Risk' => $request->deskripsiRisiko,
            'Deskripsi_Dampak' => $request->deskripsiDampakOrg,
            'Nilai_Dampak' => $request->nilaiDampakOrg,
            'Deskripsi_Kecenderungan' => $request->deskripsiKemungkinan,
            'Ref_Kecenderungan' => $request->refkecenderungan,
            'Nilai_Kecenderungan' => $request->nilaiKemungkinan,
            'Id_IIV' => $store1->Id_IIV
        ]); 

        return response()->json(['message' => 'Data berhasil disimpan di database']);

        // $store1 = tb_iiv::create([
        //     'Nama_IIV' => $maxKey
        // ]);

        // $store2 = Diagnose::create([
        //     'Id_Tujuan' => $id_tujuan,
        //     'Deskripsi_Risk' => $request->deskripsiRisiko,
        //     'Deskripsi_Dampak' => $request->deskripsiDampakOrg,
        //     'Nilai_Dampak' => $request->nilaiDampakOrg,
        //     'Deskripsi_Kecenderungan' => $request->deskripsiKemungkinan,
        //     'Ref_Kecenderungan' => $request->refkecenderungan,
        //     'Nilai_Kecenderungan' => $request->nilaiKemungkinan,
        //     'Id_IIV' => $store1->Id_IIV
        // ]); 
        
        // return response()->json(['message' => 'Data berhasil disimpan di database']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
