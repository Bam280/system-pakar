<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use DB;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.diagnose.index');
    }

    public function fetch(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('nilai')
                ->where('title', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
            foreach($data as $row)
            {
                // $g = strpos($row->title, $query);
                // $output .= '
                // <li style="word-wrap: break-word;">'.substr($row->title, $g, 50).'. . .</li>
                // ';
                $highlightedTitle = preg_replace("/($query)/i", '<strong>$1</strong>', $row->title); // Highlight the matched part
                $output .= '<li class="dropdown-item" style="word-wrap: break-word; white-space: normal; overflow: hidden; text-overflow: ellipsis;">'.$highlightedTitle.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
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
        dd($request);
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
