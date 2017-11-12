<?php

namespace App\Http\Controllers;

use App\Announce;
use Illuminate\Http\Request;
use Auth;
//use App\User;
use App\Http\Requests\Announces\AnnounceStoreRequest;

//use Gate;

class AnnounceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        //$this->authorize(Announce::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announces = Auth::user()->announces()->orderBy('id', 'desc')->get();
        return view('main.announce.index', ['announces' => $announces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.announce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnounceStoreRequest $request)
    {
        $data = $request->except('_token');

        $announce = Auth::user()->announces()->create(
                [
                    'title' => $data['title'],
                    'text' => $data['text'],
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $announce->saveImage($data['image']);
        }

        //return redirect()->back()->with('message', 'create.succsess');        
        return redirect()->route('announces.index')->with('message', 'create.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r, Announce $announce)
    {
        return view('main.announce.show', ['announce' => $announce]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function edit(Announce $announce)
    {
        //if(Gate::denies('update', $announce)) dd('=)');
        return view('main.announce.edit', ['announce' => $announce]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announce $announce)
    {
        $user = Auth::user();

        $data = $request->except('_token');

        $announce->title = $data['title'];
        $announce->text = $data['text'];
        $user->announces()->save($announce);

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            if($announce->hasImage())
            {
                $announce->deleteImage();
            }
            $announce->saveImage($data['image']);
        }

        //return redirect()->back()->with('message', 'create.succsess');        
        return redirect()->route('announces.index')->with('message', 'update.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announce $announce)
    {
        $announce->forceDelete();
        if($announce->hasImage())
        {
            $announce->deleteImage();
        }
        return redirect()->route('announces.index')->with(['message' => 'delete.success', 'id' => $announce->id]);
    }

    public function softDelete(Announce $announce)
    {
        $announce->delete();
        return redirect()->route('announces.index')->with(['message' => 'softDelete.success', 'id' => $announce->id]);
    }

    /*
      public function restore(Announce $announce)
      {
      $announce->restore();
      return redirect()->route('announces.index')->with(['message' => 'restore.success', 'id' => $announce->id]);
      }
     */

    public function restore(Request $r)
    {
        
        $id = $r->announce;
        $a = Announce::onlyTrashed()
                ->where('id', $id)
                ->restore();
         
        return redirect()->route('announces.index')->with(['message' => 'restore.success', 'id' => $id]);
    }

}
