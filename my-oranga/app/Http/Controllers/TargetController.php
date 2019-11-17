<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Target;
use Auth;

class TargetController extends Controller
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
        $target_types = ['Exercise Minutes', 'Exercise Distance', 'Total Sleep', 'Calorie Limit', 'Alcohol Limit'];
        return view('targets.create', compact('target_types'));
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
            'end_date' => 'required|date',
            'target_type' =>  'required',
            'goal' => 'required|numeric|min:0'
        ];

        //custom validation error messages
        $messages = [
            'end_date.required' => 'Please enter the date for your target to finish.',
            'goal.required' => 'Please enter a goal.',
        ];

        $request->validate($rules, $messages);

        $target = new Target;
        
        $target->user_id = Auth::user()->id;
        $target->start_date = Carbon::now();
        $target->end_date = $request->end_date;
        $target->name = $request->target_type;
        $target->goal = $request->goal;

        $target->save();

        return redirect()
            ->route('home')
            ->with('status','You set a new target! Good luck!');
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
        $target = Target::findOrFail($id);
        $target_types = ['Exercise Minutes', 'Exercise Distance', 'Total Sleep', 'Calorie Limit', 'Alcohol Limit'];
        return view('targets.edit', compact('target', 'target_types'));
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
            'end_date' => 'required|date',
            'target_type' =>  'required',
            'goal' => 'required|numeric|min:0'
        ];

        //custom validation error messages
        $messages = [
            'end_date.required' => 'Please enter the date for your target to finish.',
            'goal.required' => 'Please enter a goal.',
        ];

        $request->validate($rules, $messages);

        $target = Target::findOrFail($id);
        
        $target->user_id = Auth::user()->id;
        $target->end_date = $request->end_date;
        $target->name = $request->target_type;
        $target->goal = $request->goal;

        $target->save();

        return redirect()
            ->route('home')
            ->with('status','You successfully updated your target.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Target::findOrFail($id);
        $target->delete();
        return redirect()
        ->route('home')
        ->with('status','You successfully deleted the target.');
    }
}
