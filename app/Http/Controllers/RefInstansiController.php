<?php

namespace App\Http\Controllers;

use App\DataTables\RefInstansiDataTable;
use App\Models\RefInstansi;
use Illuminate\Http\Request;

class RefInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RefInstansiDataTable $dataTable)
    {
        return $dataTable->render('admin.ref-instansi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RefInstansi $refInstansi)
    {
        return view('admin.ref-instansi.form', compact('refInstansi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_instansi' => ['required', 'string', 'max:255']
        ]);

        RefInstansi::create($data);

        return to_route('admin.ref-instansi.index')
            ->with('success', 'Data berhasil disimpan');
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
