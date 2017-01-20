<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function __construct()
    {
        //
    }

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
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:bands,name|max:255',
        ]);

        $input                 = $request->all();
        $input['start_date']   = prepareDateInputForDb($input['start_date']);
        $input['still_active'] = (isset($input['still_active']) ? 1 : 0);

        if (Band::create($input)) {
            return redirect()->to('/')->withSuccess('Band created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Band                   $band
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
        return view('bands.show', ['band' => $band]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Band                   $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        return view('bands.edit', ['band' => $band]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Band                   $band
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band)
    {
        $this->validate($request, [
            'name'       => 'required|unique:bands,name,' . $band->id . '|max:255',
            'start_date' => 'date',
            'website'    => 'url',
        ]);

        $input                 = $request->all();
        $input['start_date']   = prepareDateInputForDb($input['start_date']);
        $input['still_active'] = (isset($input['still_active']) ? 1 : 0);

        if ($band->update($input)) {
            return redirect()->to('/')->withSuccess('Band has been updated!');
        } else {
            //Go back with error
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Band                   $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        if ($band->delete()) {
            return redirect()->back()->withSuccess('Band deleted!');
        }
    }
}
