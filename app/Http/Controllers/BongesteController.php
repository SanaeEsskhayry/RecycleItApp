<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\ImageChallenge;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('challengeindex',['challenges'=>Challenge::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('challengecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $challenge=Challenge::create($request->only(['titre','questions']));
     
        if($request->hasFile('image'))
        {
        foreach($request->image as $image)
        {
            $image_name =time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);
            $images=ImageChallenge::create(['path'=>$image_name]);
            $images->challenge()->associate($challenge)->save();
        }
        

        }
        return redirect()->route('challenges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Challenge::destroy($id);
        return redirect()->route('challenges.index');

    }
}
