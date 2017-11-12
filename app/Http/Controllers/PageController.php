<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Announce;
use App\Page;
use App\Http\Requests\SearchRequest;

class PageController extends Controller
{

    protected $pages;

    public function __construct()
    {
        $this->pages = Page::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announces = Announce::orderBy('id', 'desc')->get();
        return view('main.index', ['pages' => $this->pages, 'announces' => $announces]);
    }

    public function page($alias)
    {
        $page = Page::where('alias', strip_tags($alias))->first();
        $data = [
            'page' => $page,
            'pages' => $this->pages,
        ];
        return view('main.show', $data);
    }

    public function search(SearchRequest $request)
    {
        $searchString = str_replace('%', '\\%', $request->s);
        $announces = Announce::where('title', 'like', "%$searchString%")
                        ->orWhere('text', 'like', "%$searchString%")->get();

        $data = [
            'searchString' => $searchString,
            'announces' => $announces,
        ];
        return view('main.search', $data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
      public function show($id)
      {
      $page = DB::select('SELECT * FROM `pages` WHERE id=:id', ['id' => $id]);
      $pages = DB::select('SELECT * FROM `pages`');
      $data = [
      'page' => $page[0],
      'pages' => $pages,
      ];
      return view('main.show', $data);
      }
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
