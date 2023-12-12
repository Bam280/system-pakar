<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $options = $request->input('options');
        $longText = $request->input('longText');

        // Simpan data ke database (gunakan Eloquent)
        $formData = new FormData();
        $formData->form_1_data = json_encode($options);
        $formData->form_2_data = $longText;
        $formData->save();

        return response()->json(['message' => 'Data berhasil disimpan di database']);
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
