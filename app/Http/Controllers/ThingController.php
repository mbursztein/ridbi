<?php

namespace ridbi\Http\Controllers;

use Illuminate\Http\Request;
use ridbi\Http\Requests\ThingRequest;
use ridbi\Http\Controllers\Controller;
use ridbi\Thing;
use ridbi\Photo;

class ThingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $things = Thing::all();
        return view('things.index', compact('things'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('things.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThingRequest $request)
    {
        
        $thingy = \Auth::user()->things()->create($request->all());

        $thingy->save();
        
        flash()->success('Great!', 'Your thing has been created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thing = Thing::findOrFail($id);
        return view('things.show', compact('thing'));
    }

    public function addPhoto($id, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png'
        ]);

        $thing = Thing::findOrFail($id);


        if (! $thing->ownedBy(\Auth::user())) {
            return $this->unauthorized($request);
        }



        $photo = Photo::fromForm($request->file('photo'));
        Thing::findOrFail($id)->addPhoto($photo);

    }


    protected function unauthorized(Request $request)
    {
        if ($request->ajax()) {
            return response(['message' => 'Nope.'], 403);
        }

        flash('Nope.');
        return redirect('/');
    }


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
