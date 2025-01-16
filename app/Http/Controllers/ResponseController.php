<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Pawnshop;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit($pawnshop_id)
    {
        $data = Response::where('pawnshop_id', $pawnshop_id)->first();
        $pawnshopId = $pawnshop_id;
        return view('petugas.response', compact('data', 'pawnshopId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pawnshop_id)
    {
        $request->validate([
            'type' => 'required',
        ]);

        if ($request->type == 'Ditolak') {
            $loc = NULL;
        }else {
            $loc = $request->shop_location;
        }
        Response::updateOrCreate(
            [
                'pawnshop_id' => $pawnshop_id,
            ],
            [
                'type' => $request->type,
                'shop_location' => $loc,
            ]
        );

        return redirect()->route('petugas.data.status')->with('response', 'Success add response, please check!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
