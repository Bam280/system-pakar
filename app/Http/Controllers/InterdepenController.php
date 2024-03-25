<?php

namespace App\Http\Controllers;

use App\DataTables\InterdepenDataTable;
use App\Models\Interdepen;
use App\Http\Requests\Request;

class InterdepenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InterdepenDataTable $dataTable)
    {
        return $dataTable->render('pages.interdepen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.interdepen.form', compact('interdepen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated([
            'ref_interdepen_id' => ['required', 'exists:ref_interdepen,id'],
        'sistem_elektronik_id' => ['required', 'exists:sistem_elektronik,id'],
        'sistem_iiv_id' => ['required', 'exists:sistem_iiv,id'],
        'deskripsi_interdepen' => ['required', 'longtext'],
        ]);

        Interdepen::create($data);

        return to_route('interdepen.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(interdepen $interdepen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(interdepen $interdepen)
    {
        return view('pages.interdepen.form', compact('interdepen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interdepen $interdepen)
    {
        $data = $request->validate([
            'ref_interdepen_id' => ['required', 'exists:ref_interdepen,id'],
            'sistem_elektronik_id' => ['required', 'exists:sistem_elektronik,id'],
            'sistem_iiv_id' => ['required', 'exists:sistem_iiv,id'],
            'deskripsi_interdepen' => ['required', 'longtext'],
        ]);

        $interdepen->update($data);

        return to_route('interdepen.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(interdepen $interdepen)
    {
        $interdepen -> delete();
        return to_route('iiv.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
