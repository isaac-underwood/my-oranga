<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use Auth;

class WeightController extends Controller
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
        return view('weights.create');
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
            'weight' => 'required|numeric|min:1|max:1000'
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date that you recorded your weight.',
            'weight.required' => 'Please enter a weight.',
            'weight.m*' => 'Hmmm, this doesn\'t look quite right, please re-check your input.',
        ];

        $request->validate($rules, $messages);
        $weight = new Weight;

        $weight->user_id = Auth::user()->id;
        $weight->date = $request->date;
        $weight->kg = $request->weight;
        $weight->save();

        return redirect()
            ->route('home')
            ->with('status','You added a new weight record for ' . $weight->date);
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
        $weight = Weight::findOrFail($id);
        return view('weights.edit', compact('weight'));
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
            'weight' => 'required|numeric|min:1'
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date that you recorded your weight.',
            'weight.required' => 'Please enter a weight.',
        ];

        $request->validate($rules, $messages);
        $weight = Weight::find($id);

        $weight->user_id = Auth::user()->id;
        $weight->date = $request->date;
        $weight->kg = $request->weight;
        $weight->save();

        return redirect()
            ->route('home')
            ->with('status','You updated a weight record for ' . $weight->date);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weight = Weight::findOrFail($id);
        $weight->delete();
        return redirect()
            ->route('home')
            ->with('status','You successfully deleted a weight record.');
    }
}
