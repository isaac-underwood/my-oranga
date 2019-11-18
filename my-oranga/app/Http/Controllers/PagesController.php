<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class PagesController extends Controller
{

    public function results()
    {
        $activity_type = DB::table('activities')->select('type', DB::raw('COUNT(type) AS occurrences'))
        ->groupBy('type')
        ->orderBy('occurrences', 'DESC')
        ->limit(5)
        ->get();
        $activity_type_array[] = ['type', 'occurrences'];
        foreach($activity_type as $key => $value)
        {
            $activity_type_array[++$key] = [$value->type, $value->occurrences];
        }

        return view('results')->with('activity_type', json_encode($activity_type_array));
    }

    public function entries()
    {
        $activities = Auth::user()->activities()->paginate(1, ['*'], 'activities');
        $alcohols = Auth::user()->alcohols()->paginate(1, ['*'], 'alcohols');
        $moods = Auth::user()->moods()->paginate(1, ['*'], 'moods');

        return view('entries', compact('activities', 'alcohols', 'moods'));
    }
}
