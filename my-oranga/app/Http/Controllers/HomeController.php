<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::check())
        {
            return view('/home');
        }
        else
        {
            $target_progress = [];
            $recent_targets = Auth::user()->targets()->where('end_date', '>=', Carbon::now())->limit(3)->get();
            foreach($recent_targets as $target)
            {
            }

            $total_alcohol_drinks = Auth::user()->alcohols()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('standard_drink');
            $total_exercise_minutes = Auth::user()->activities()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('minutes');
            $total_exercise_distance = Auth::user()->activities()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('distance');
            $average_mood = Auth::user()->moods()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->avg('indicator');
            $total_calories = Auth::user()->snacks()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('calories');
            $latest_weight = Auth::user()->weights()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest('date')->first();
            return view('dashboard', compact('recent_targets','total_alcohol_drinks', 'total_exercise_minutes', 'total_exercise_distance', 'average_mood', 'total_calories', 'latest_weight'));
        }
    }
}
