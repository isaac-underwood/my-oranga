<?php

namespace App\Http\Controllers;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;
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
            'location' => 'required|string|min:1',
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
        $activity->location = $request->location;
        $activity->type = $request->activity;
        $activity->minutes = $request->time;
        $activity->distance = $request->distance;
        $activity->save();

        return redirect()
            ->route('home')
            ->with('status','Added ' . $activity->minutes . ' minute ' . $activity->type . ' on ' . $activity->date . ' at ' . $activity->location);
    }

    public function calendar()
    {
        $events = [];
        $data = Activity::where('user_id', Auth::user()->id)->get();

        if ($data->count())
        {
            foreach ($data as $key => $value)
            {
                switch (strtoupper($value->type))
                {
                    case "RUN":
                        $color = "green";
                        break;
                    case "WALK":
                        $color = "orange";
                        break;
                    case "SURF":
                        $color = "blue";
                        break;
                    case "SWIM":
                        $color = "blue";
                        break;
                    case "YOGA":
                        $color = "red";
                        break;
                    case "GYM":
                        $color = "brown";
                        break;
                    default:
                        $color = "grey";
                        break;
                }

                $events[] = Calendar::event(
                    $value->type,
                    true,
                    new \DateTime($value->date),
                    new \DateTime($value->date.'+1 day'),
                    null,
                    //Add colours
                    [
                        'color' => $color,
                        'textColor' => 'white',
                    ]
                    );
            }
        }

        $calendar = Calendar::addEvents($events);
        return view('calendar', compact('calendar'));
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
            'location' => 'required|string|min:1',
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
        $activity->location = $request->location;
        // $acitivty->end_date = $request->end_date;
        $activity->type = $request->activity;
        $activity->minutes = $request->time;
        $activity->distance = $request->distance;
        $activity->save();

        return redirect()
            ->route('home')
            ->with('status','Successfully updated your ' . $activity->type . ' that is on ' . $activity->date . ' at ' . $activity->location);
        
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
