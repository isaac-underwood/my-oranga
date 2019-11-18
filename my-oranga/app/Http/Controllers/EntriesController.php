<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EntriesController extends Controller
{
    public function activities()
    {
        $activities = Auth::user()->activities()->paginate(30);
        return view('entries.activities', compact('activities'));
    }

    public function alcohol()
    {
        $alcohols = Auth::user()->alcohols()->paginate(30);
        return view('entries.alcohol', compact('alcohols'));
    }

    public function moods()
    {
        $moods = Auth::user()->moods()->paginate(30);
        return view('entries.moods', compact('moods'));
    }

    public function snacks()
    {
        $snacks = Auth::user()->snacks()->paginate(30);
        return view('entries.snacks', compact('snacks'));
    }

    public function sleep()
    {
        $sleep = Auth::user()->sleeps()->paginate(30);
        return view('entries.sleep', compact('sleep'));
    }
}
