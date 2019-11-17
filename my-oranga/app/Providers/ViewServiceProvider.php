<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Auth;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){
            if(Auth::check())
            {
                $coach_mood = Auth::user()->moods()->where('user_id', Auth::user()->id)
                ->whereBetween('date', [Carbon::now()->subDays(3), Carbon::now()])->avg('indicator');
                $coach_sleep = Auth::user()->sleeps()->where('user_id', Auth::user()->id)
                ->whereBetween('date', [Carbon::now()->subDays(3), Carbon::now()])->avg('hours');
                $coach_snacks = Auth::user()->snacks()->where('user_id', Auth::user()->id)
                ->whereBetween('date', [Carbon::now()->subDays(3), Carbon::now()])->sum('calories');
                $coach_alcohol = Auth::user()->alcohols()->where('user_id', Auth::user()->id)
                ->whereBetween('date', [Carbon::now()->subDays(3), Carbon::now()])->sum('standard_drink');
                $coach_activities = Auth::user()->activities()->where('user_id', Auth::user()->id)
                ->whereBetween('date', [Carbon::now()->subDays(3), Carbon::now()])->count();
                $view->with('coach_ai', [$coach_mood, $coach_sleep, $coach_snacks, $coach_alcohol, $coach_activities]);
            }
        });
    }
}
