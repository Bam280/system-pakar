<?php

namespace App\Http\Controllers;

use App\DataTables\RefInterdepenDataTable;
use App\Models\RefInterdepen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RefInterdepenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RefInterdepenDataTable $dataTable)
    {
        return $dataTable->render('pages.ref-interdepen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RefInterdepen $refInterdepen)
    {
        return view('pages.ref-interdepen.form', compact('refInterdepen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'indikator_interdepen' => ['required', 'string', 'max:255', Rule::unique('ref_interdepen', 'indikator_interdepen')],
            'label' => ['required', 'string', 'max:255', Rule::unique('ref_interdepen', 'label')],
            'poin' => ['required', 'numeric'],
        ]);

        RefInterdepen::create($data);

        return to_route('ref-interdepen.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RefInterdepen $refInterdepen)
    {
        return view('pages.ref-interdepen.form', compact('refInterdepen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RefInterdepen $refInterdepen)
    {
        $data = $request->validate([
            'indikator_interdepen' => ['required', 'string', 'max:255', Rule::unique('ref_interdepen', 'indikator_interdepen')->ignoreModel($refInterdepen)],
            'label' => ['required', 'string', 'max:255', Rule::unique('ref_interdepen', 'label')->ignoreModel($refInterdepen)],
            'poin' => ['required', 'numeric'],
        ]);

        $refInterdepen->update($data);

        return to_route('ref-interdepen.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RefInterdepen $refInterdepen)
    {
        $refInterdepen->delete();

        return to_route('ref-interdepen.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
