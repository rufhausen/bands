<?php

namespace App\Http\Controllers;

use App\Album;
use App\Band;
use App\Genre;
use App\Services\AlbumCoverService;
use App\Services\TableSortingTrait;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    use TableSortingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albumModel = new Album;

        //Filter by band
        if (!empty($request->input('band_id'))) {
            $albumModel = $albumModel->where('band_id', $request->input('band_id'));
        }

        if (!empty($request->input('sort_column')) && !empty($request->input('order'))) {
            //Prevent passing bad/dangerous data
            $valid_order  = in_array($request->input('order'), ['asc', 'desc']);
            $valid_column = \Schema::hasColumn('albums', $request->input('sort_column'));

            if ($valid_order && $valid_column) {
                $albumModel = $albumModel::orderBy($request->input('sort_column'), $request->input('order'));
            }
        }

        $albums      = $albumModel->paginate(5);
        $bands       = Band::all();
        $totalAlbums = Album::all()->count();

        $sortParams = $this->getSortParams($request);

        return view('albums.index', compact('albums', 'bands', 'totalAlbums', 'sortParams'));
    }

    public function create()
    {
        $bands  = Band::all();
        $genres = Genre::all();
        return view('albums.create', compact('bands', 'genres'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|max:255',
            'band_id' => 'required',
        ]);

        $input                 = $request->all();
        $input['record_date']  = prepareDateInputforDb($input['record_date']);
        $input['release_date'] = prepareDateInputforDb($input['release_date']);

        $newAlbum = Album::create($input);

        if ($newAlbum) {
            $cover = new AlbumCoverService();
            $cover->makeCover($newAlbum->id);
            return redirect()->route('albums.index')->withSuccess('Album Created!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album                  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $bands  = Band::all();
        $genres = Genre::all();
        return view('albums.edit', ['album' => $album, 'bands' => $bands, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Album                  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $this->validate($request, [
            'name'    => 'required|max:255',
            'band_id' => 'required',
        ]);

        $input                 = $request->all();
        $input['record_date']  = prepareDateInputforDb($input['record_date']);
        $input['release_date'] = prepareDateInputforDb($input['release_date']);

        if ($album->update($input)) {
            return redirect()->route('albums.index')->withSuccess('Album updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album                  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        if ($album->delete()) {
            return redirect()->back()->withSuccess("The Album {$album->name} has been deleted!");
        }
    }
}
