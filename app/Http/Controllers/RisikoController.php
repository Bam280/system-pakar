<?php

namespace App\Http\Controllers;

use App\Models\Risiko;
use App\DataTables\RisikoDataTable;
use App\Http\Requests\StorerisikoRequest;
use App\Http\Requests\UpdaterisikoRequest;

class RisikoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RisikoDataTable $dataTable)
    {
        return $dataTable->render('pages.risiko.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Risiko $risiko)
    {
        return view('pages.risiko.form', compact('risiko'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorerisikoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(risiko $risiko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(risiko $risiko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterisikoRequest $request, risiko $risiko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(risiko $risiko)
    {
        //
    }
}
