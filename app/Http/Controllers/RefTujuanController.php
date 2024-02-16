<?php

namespace App\Http\Controllers;

use App\DataTables\RefTujuanDataTable;
use App\Models\RefTujuan;
use Illuminate\Http\Request;

class RefTujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RefTujuanDataTable $dataTable)
    {
        return $dataTable->render('pages.ref-tujuan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RefTujuan $refTujuan)
    {
        return view('pages.ref-tujuan.form', compact('refTujuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tujuan_keamanan' => ['required', 'string', 'max:255']
        ]);

        RefTujuan::create($data);

        return to_route('ref-tujuan.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RefTujuan $refTujuan)
    {
        return view('pages.ref-tujuan.form', compact('refTujuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RefTujuan $refTujuan)
    {
        $data = $request->validate([
            'tujuan_keamanan' => ['required', 'string', 'max:255']
        ]);

        $refTujuan->update($data);

        return to_route('ref-tujuan.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RefTujuan $refTujuan)
    {
        $refTujuan->delete();

        return to_route('ref-tujuan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
