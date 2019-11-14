<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sleep;
use Auth;

class SleepController extends Controller
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
        $last_sleep = Sleep::where('user_id', Auth::user()->id)->latest('date')->first();
        return view('sleep.create', compact('last_sleep'));
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
            'hours' => 'required|numeric|min:0.25|max:99.99'
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date that your sleep started on.',
            'hours.required' => 'Please enter the amount of hours you slept.',
            'hours.min' => 'The minimum sleep you can enter is 15 minutes.',
            'hours.max' => 'It is not possible to sleep for this long. Please check your input and try again.'
        ];

        $request->validate($rules, $messages);
        $sleep = new Sleep;

        $sleep->user_id = Auth::user()->id;
        $sleep->date = $request->date;
        $sleep->hours = $request->hours;
        $sleep->save();

        return redirect()
            ->route('home')
            ->with('status','You added a new sleep record for ' . $sleep->date . '. You slept for ' . $sleep->hours . ' hours.');
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
        $sleep = Sleep::findOrFail($id);
        return view('sleep.edit', compact('sleep'));
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
            'hours' => 'required|numeric|min:0.25|max:99.99'
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date that your sleep started on.',
            'hours.required' => 'Please enter the amount of hours you slept.',
            'hours.min' => 'The minimum sleep you can enter is 15 minutes.',
            'hours.max' => 'It is not possible to sleep for this long. Please check your input and try again.'
        ];

        $request->validate($rules, $messages);
        $sleep = Sleep::find($id);

        $sleep->user_id = Auth::user()->id;
        $sleep->date = $request->date;
        $sleep->hours = $request->hours;
        $sleep->save();

        return redirect()
            ->route('home')
            ->with('status','You updated a sleep record for ' . $sleep->date . '. You slept for ' . $sleep->hours . ' hours.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sleep = Sleep::find($id);
        $sleep->delete();
        return redirect()
        ->route('home')
        ->with('status','You successfully deleted a sleep record');
    }
}
