<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alcohol;

class AlcoholController extends Controller
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
        return view('alcohol.create');
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
            'item' =>  'required|min:1',
            'std' => 'required|number',
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date for your alcohol consumption.',
            'item.required' => 'Please enter the alcohol item.',
            'std.required' => 'Please enter the amount of standard drinks.'
        ];

        $request->validate($rules, $messages);

        $alcohol = new Mood;
        $alcohol->user_id = Auth::user()->id;
        $alcohol->date = $request->date;
        $alcohol->item = $request->item;
        $alcohol->standard_drink = $request->std;
        $alcohol->save();

        return redirect()
            ->route('home')
            ->with('status','You added a new alcohol consumption record for ' . $alcohol->date);
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
        $alcohol = Alcohol::find($id);
        return view('alcohol.edit', compact('alcohol'));
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
        $alcohol = Alcohol::find($id);
        $alcohol->delete();

        return redirect()
        ->route('home')
        ->with('status','You successfully deleted the alcohol record.');
    }
}
