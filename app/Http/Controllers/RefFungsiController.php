<?php

namespace App\Http\Controllers;

use App\DataTables\RefFungsiDataTable;
use App\Models\RefFungsi;
use Illuminate\Http\Request;

class RefFungsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RefFungsiDataTable $dataTable)
    {
        return $dataTable->render('pages.ref-fungsi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RefFungsi $refFungsi)
    {
        return view('pages.ref-fungsi.form', compact('refFungsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'indikator_fungsi' => ['required', 'string', 'max:255']
        ]);

        RefFungsi::create($data);

        return to_route('ref-fungsi.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RefFungsi $refFungsi)
    {
        return view('pages.ref-fungsi.form', compact('refFungsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RefFungsi $refFungsi)
    {
        $data = $request->validate([
            'indikator_fungsi' => ['required', 'string', 'max:255']
        ]);

        $refFungsi->update($data);

        return to_route('ref-fungsi.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RefFungsi $refFungsi)
    {
        $refFungsi->delete();

        return to_route('ref-fungsi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
