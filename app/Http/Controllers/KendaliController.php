<?php

namespace App\Http\Controllers;

use App\Models\Kendali;
use App\DataTables\KendaliDataTable;
use App\Http\Requests\StorekendaliRequest;
use App\Http\Requests\UpdatekendaliRequest;

class KendaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KendaliDataTable $dataTable)
    {
        return $dataTable->render('pages.kendali.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekendaliRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(kendali $kendali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kendali $kendali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekendaliRequest $request, kendali $kendali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kendali $kendali)
    {
        //
    }
}
