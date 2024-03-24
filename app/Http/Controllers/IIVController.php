<?php

namespace App\Http\Controllers;

use App\DataTables\IIVDataTable;
use App\Models\interdepen;
use App\Models\IIV;
use Illuminate\Http\Request;

class IIVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IIVDataTable $dataTable)
    {
        return $dataTable->render('pages.iiv.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(IIV $iiv)
    {
        return view('pages.iiv.form', compact('iiv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'ref_instansi_id' => ['required', 'exists:ref_instansi,id'],
            'nilai_risiko' => ['required', 'string', 'max:255'],
        ]);

        IIV::create($data);

        return to_route('iiv.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IIV $iiv)
    {
        return view('pages.iiv.form', compact('iiv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IIV $iiv)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'ref_instansi_id' => ['required', 'exists:ref_instansi,id'],
            'nilai_risiko' => ['required', 'string', 'max:255'],
        ]);

        $iiv->update($data);

        return to_route('iiv.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IIV $iiv)
    {
        $iiv->delete();

        return to_route('iiv.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
