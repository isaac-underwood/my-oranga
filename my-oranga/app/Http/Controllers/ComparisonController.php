<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Snack;
use App\Activity;
use App\Sleep;
use Carbon\Carbon;

class ComparisonController extends Controller
{
    //Returns page that shows progress comparison
    public function showCompare()
    {
        $others_minutes = $this->generateOthersActivityMinutes();
        $others_distance = $this->generateOthersActivityDistance();
        $others_calories = $this->generateOthersSnackCalories();
        $others_sleep = $this->generateOthersSleepHours();
        $user_minutes = $this->generateUserActivityMinutes();
        $user_distance = $this->generateUserActivityDistance();
        $user_calories = $this->generateUserSnackCalories();
        $user_sleep = $this->generateUserSleepHours();

        return view('/compare', compact('others_minutes', 'others_distance', 'others_calories', 'others_sleep', 
        'user_minutes', 'user_distance', 'user_calories', 'user_sleep'));
    }

    public function generateUserActivityMinutes()
    {
        $today = Carbon::today();
        $minutes = Activity::where('user_id', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->sum('minutes');
        return $minutes;
    }

    public function generateUserActivityDistance()
    {
        $today = Carbon::today();
        $distance = Activity::where('user_id', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->sum('distance');
        return $distance;
    }

    public function generateUserSnackCalories()
    {
        $today = Carbon::today();
        $calories = Snack::where('user_id', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->sum('calories');
        return $calories;
    }

    public function generateUserSleepHours()
    {
        $today = Carbon::today();
        $hours = Sleep::where('user_id', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->sum('hours');
        return $hours;
    }

    public function generateOthersActivityMinutes()
    {
        $today = Carbon::today();
        $minutes = Activity::where('user_id', '!=', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->groupBy('id')->avg('minutes');
        return $minutes;
    }

    public function generateOthersActivityDistance()
    {
        $today = Carbon::today();
        $distance = Activity::where('user_id', '!=', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->groupBy('id')->avg('distance');
        return $distance;
    }

    public function generateOthersSnackCalories()
    {
        $today = Carbon::today();
        $calories = Snack::where('user_id', '!=', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->groupBy('id')->avg('calories');
        return $calories;
    }

    public function generateOthersSleepHours()
    {
        $today = Carbon::today();
        $hours = Sleep::where('user_id', '!=', Auth::user()->id)->where('date', '>=', $today->startOfMonth())->groupBy('id')->avg('hours');
        return $hours;
    }
}
