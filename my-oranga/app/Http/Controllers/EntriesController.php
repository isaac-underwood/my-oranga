<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EntriesController extends Controller
{
    public function activities()
    {
        $activities = Auth::user()->activities()->orderBy('date', 'desc')->paginate(30);
        return view('entries.activities', compact('activities'));
    }

    public function alcohol()
    {
        $alcohols = Auth::user()->alcohols()->orderBy('date', 'desc')->paginate(30);
        return view('entries.alcohol', compact('alcohols'));
    }

    public function moods()
    {
        $moods = Auth::user()->moods()->orderBy('date', 'desc')->paginate(30);
        return view('entries.moods', compact('moods'));
    }

    public function snacks()
    {
        $snacks = Auth::user()->snacks()->orderBy('date', 'desc')->paginate(30);
        return view('entries.snacks', compact('snacks'));
    }

    public function sleep()
    {
        $sleeps = Auth::user()->sleeps()->orderBy('date', 'desc')->paginate(30);
        return view('entries.sleep', compact('sleeps'));
    }

    public function targets()
    {
        $targets = Auth::user()->targets()->orderBy('start_date', 'desc', 'end_date', 'desc')->paginate(30);
        return view('entries.targets', compact('targets'));
    }

    public function weights()
    {
        $weights = Auth::user()->weights()->orderBy('date', 'desc')->paginate(30);
        return view('entries.weights', compact('weights'));
    }
}
