<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Auth;

class ActivityController extends Controller
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
        return view('activities.create');
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
            'start_date' => 'required|date',
            'activity'     =>  'required|string|min:1',
            'time' => 'required|numeric',
            'distance' => 'numeric'
        ];
        //custom validation error messages
        $messages = [
            '*.required' => 'Please fill out this field.',
        ];
        //First Validate the form data
         $request->validate($rules,$messages);
        
        $activity = new Activity;
        $activity->user_id = Auth::user()->id;
        $activity->date = $request->start_date;
        // $acitivty->end_date = $request->end_date;
        $activity->type = $request->activity;
        $activity->minutes = $request->time;
        $activity->distance = $request->distance;
        $activity->save();

        return redirect()
            ->route('home')
            ->with('status','Added ' . $activity->minutes . ' minute ' . $activity->type . ' on ' . $activity->date);
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
        $activity = Activity::find($id);
        return view('activities.edit', compact('activity'));
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
            'start_date' => 'required|date',
            'activity'     =>  'required|string|min:1',
            'time' => 'required|numeric',
            'distance' => 'required|numeric'
        ];
        //custom validation error messages
        $messages = [
            '*.required' => 'Please fill out this field.',
        ];
        //First Validate the form data
         $request->validate($rules,$messages);
        
        $activity = Activity::find($id);
        $activity->user_id = Auth::user()->id;
        $activity->date = $request->start_date;
        // $acitivty->end_date = $request->end_date;
        $activity->type = $request->activity;
        $activity->minutes = $request->time;
        $activity->distance = $request->distance;
        $activity->save();

        return redirect()
            ->route('home')
            ->with('status','Successfully updated your ' . $activity->type . ' that is on ' . $activity->date);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect()
        ->route('home')
        ->with('status','Successfully deleted the activity.');
    }
}
