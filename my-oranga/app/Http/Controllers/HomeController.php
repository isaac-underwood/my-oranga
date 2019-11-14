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
            $total_alcohol_drinks = Auth::user()->alcohols()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('standard_drink');
            $total_exercise_minutes = Auth::user()->activities()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('minutes');
            $total_exercise_distance = Auth::user()->activities()->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('distance');
            return view('dashboard', compact('total_alcohol_drinks', 'total_exercise_minutes', 'total_exercise_distance'));
        }
    }
}
