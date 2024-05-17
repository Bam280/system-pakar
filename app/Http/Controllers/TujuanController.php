<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\DataTables\TujuanDataTable;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TujuanDataTable $dataTable)
    {
        return $dataTable->render('pages.tujuan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tujuan.form', compact('tujuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'deskripsi_tujuan' => ['required', 'longtext'],
            'iiv_id' => ['required', 'integer'],
            'ref_tujuan_id' => ['required', 'integer'],
        ]);

        Tujuan::create($data);

        return to_route('tujuan.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tujuan $tujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tujuan $tujuan)
    {
        return view('pages.tujuan.form', compact('tujuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tujuan $tujuan)
    {
        $data = $request->validate([
            'deskripsi_tujuan' => ['required'],
            'ref_tujuan_id' => ['required', 'integer'],
            'iiv_id' => ['required', 'integer'],
        ]);

        $tujuan->update($data);

        return to_route('tujuan.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tujuan $tujuan)
    {
        $tujuan->delete();

        return to_route('tujuan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
