<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Snack;
use Auth;

class SnackController extends Controller
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
        $last_snack = Snack::where('user_id', Auth::user()->id)->latest('date')->first();
        return view('snacks.create', compact('last_snack'));
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
            'energy_amount' => 'required|numeric'
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date for your snack consumption.',
            'item.required' => 'Please enter the snack item.',
            'energy_amount.required' => 'Please enter the amount of energy for the item.'
        ];

        $request->validate($rules, $messages);
        $snack = new Snack;

        //Calculate calories
        if ($request->energy_type == "kj")
        {
            $snack->kj = $request->energy_amount;
            $snack->calories = $request->energy_amount * 0.239;
        }
        else
        {
            $snack->calories = $request->energy_amount;
            $snack->kj = $request->energy_amount * 4.184;
        }
        
        $snack->user_id = Auth::user()->id;
        $snack->date = $request->date;
        $snack->item = $request->item;
        $snack->save();

        return redirect()
            ->route('home')
            ->with('status','You added a new snack record for ' . $snack->date);
        
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
        $snack = Snack::findOrFail($id);
        return view('snacks.edit', compact('snack', 'last_snack'));
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
            'item' =>  'required|min:1',
            'energy_amount' => 'required|numeric'
        ];

        //custom validation error messages
        $messages = [
            'date.required' => 'Please enter the date for your snack consumption.',
            'item.required' => 'Please enter the snack item.',
            'energy_amount.required' => 'Please enter the amount of energy for the item.'
        ];

        $request->validate($rules, $messages);
        $snack = Snack::find($id);

        //Calculate calories
        if ($request->energy_type == "kj")
        {
            $snack->kj = $request->energy_amount;
            $snack->calories = $request->energy_amount * 0.239;
        }
        else
        {
            $snack->calories = $request->energy_amount;
            $snack->kj = $request->energy_amount * 4.184;
        }
        
        $snack->user_id = Auth::user()->id;
        $snack->date = $request->date;
        $snack->item = $request->item;
        $snack->save();

        return redirect()
            ->route('home')
            ->with('status','You updated your snack record for ' . $snack->date);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $snack = Snack::find($id);
        $snack->delete();
        return redirect()
        ->route('home')
        ->with('status','You successfully deleted the snack.');
    }
}
