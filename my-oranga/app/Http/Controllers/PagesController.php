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
        ->get();
        $activity_type_array[] = ['type', 'occurrences'];
        foreach($activity_type as $key => $value)
        {
            $activity_type_array[++$key] = [$value->type, $value->occurrences];
        }

        $snack_time = Auth::user()->snacks()->select('calories', 'date')
                                            ->orderBy('date')
                                            ->get();
        $snack_time_array[] = ['time', 'calories'];
        foreach($snack_time as $key => $value)
        {
            $snack_time_array[++$key] = [$value->date, $value->calories];
        }

        $mood_alcohol = DB::table('moods')
                            ->join('alcohols', 'alcohols.user_id', '=', 'moods.user_id')
                            ->where('alcohols.user_id', Auth::user()->id)
                            ->where('alcohols.date', 'moods.date')
                            ->select('alcohols.date', 'alcohols.standard_drink', 'moods.indicator')
                            ->get();
        $mood_alcohol_array[] = ['time', 'mood', 'alcohol'];
        foreach($mood_alcohol as $key => $value)
        {
            $mood_alcohol_array[++$key] = [$value->date, $value->indicator, $value->standard_drink];
        }
        return view('results')
        ->with('activity_type', json_encode($activity_type_array))
        ->with('snack_time', json_encode($snack_time_array))
        ->with('mood_alcohol', json_encode($mood_alcohol_array));
    }

    public function entries()
    {
        $activities = Auth::user()->activities()->paginate(1, ['*'], 'activities');
        $alcohols = Auth::user()->alcohols()->paginate(1, ['*'], 'alcohols');
        $moods = Auth::user()->moods()->paginate(1, ['*'], 'moods');

        return view('entries', compact('activities', 'alcohols', 'moods'));
    }
}
