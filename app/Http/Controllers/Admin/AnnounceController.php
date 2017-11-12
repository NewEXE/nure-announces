<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Announce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnounceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announces = Announce::withTrashed()->orderBy('id', 'desc')->get();
        return view('admin.announce.index', ['announces' => $announces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $announce = Auth::user()->announces()->create(
                [
                    'title' => $data['title'],
                    'text' => $data['text'],
        ]);
        if($data['inTrash'])
        {
            $announce->delete();
        }

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $announce->saveImage($data['image']);
        }

        //return redirect()->back()->with('message', 'create.succsess');        
        return redirect()->route('admin.announces.index')->with('message', 'create.success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $announce = Announce::withTrashed()->find($request->announce);
        
        return view('admin.announce.edit', ['announce'=>$announce]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->except('_token');

        $announce = Announce::withTrashed()->find($request->announce);
        $announce->title = $data['title'];
        $announce->text = $data['text'];
        $user->announces()->save($announce);
        
        if($data['inTrash'])
        {
            $announce->trashed() ? : $announce->delete();
        }
        else
        {
            $announce->trashed() ? $announce->restore() : '';
        }

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            if($announce->hasImage())
            {
                $announce->deleteImage();
            }
            $announce->saveImage($data['image']);
        }

        //return redirect()->back()->with('message', 'create.succsess');        
        return redirect()->route('admin.announces.index')->with('message', 'update.success');
        //return redirect()->route('announces.update', ['announce'=>$announce->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $announce = Announce::withTrashed()->find($request->announce);
        if($announce->trashed())
        {
            $announce->forceDelete();
        }
        else 
        {
            $announce->delete();
            $announce->forceDelete();
        }
        return redirect()->route('admin.announces.index')->with('message', 'delete.success');
    }

}
