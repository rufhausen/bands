<?php

namespace App\Http\Controllers;

use App\Band;
use App\Services\TableSortingTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use TableSortingTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bandModel = new Band;

        if (!empty($request->input('sort_column')) && !empty($request->input('order'))) {
            //Prevent passing bad/dangerous data
            $valid_order  = in_array($request->input('order'), ['asc', 'desc']);
            $valid_column = \Schema::hasColumn('bands', $request->input('sort_column'));

            if ($valid_order && $valid_column) {
                $bandModel = $bandModel->orderBy($request->input('sort_column'), $request->input('order'));
            }
        }

        $bands      = $bandModel->paginate(10);
        $sortParams = $this->getSortParams($request);

        return view('home', compact('bands', 'sortParams'));
    }
}
