<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mood;
use Auth;
use Carbon\Carbon;

class MoodController extends Controller
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
        return view('moods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'date' => 'required|date',
            'mood'     =>  'required|min:1|max:10',
        ];
        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date for your mood.',
        ];
        $request->validate($rules, $messages);
        $mood = new Mood;
        $mood->user_id = Auth::user()->id;
        $mood->date = $request->date;
        $mood->indicator = $request->mood;
        $mood->save();

        return redirect()
            ->route('home')
            ->with('status','You added your mood for ' . $mood->date . '. It was a ' . $mood->indicator);
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
        $mood = Mood::find($id);
        return view('moods.edit', compact('mood'));
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
        //validation rules
        $rules = [
            'date' => 'required|date',
            'mood'     =>  'required|min:1|max:10',
        ];
        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date for your mood.',
        ];
        $request->validate($rules, $messages);
        $mood = Mood::find($id);
        $mood->user_id = Auth::user()->id;
        $mood->date = $request->date;
        $mood->indicator = $request->mood;
        $mood->save();

        return redirect()
            ->route('home')
            ->with('status','You updated your mood for ' . $mood->date);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mood = Mood::find($id);
        $mood->delete();
        
        return redirect()
        ->route('home')
        ->with('status','You successfully deleted the mood.');
    }
}
