<?php

namespace App\Http\Controllers;

use App\DataTables\ResultHistoryDataTable;
use App\Models\ResultHistory;

class ResultHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ResultHistoryDataTable $dataTable)
    {
        return $dataTable->render('pages.result-history.index');
    }

    /**
     * Display the specified resource.
     */
    public function rerun(ResultHistory $resultHistory)
    {
        session()->put('diagnose_data', $resultHistory->attributes);
        return redirect()->route('diagnose.form.form1');
    }
}
