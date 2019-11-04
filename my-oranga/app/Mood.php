<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $fillable = [
        'user_id', 'date', 'indicator'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
