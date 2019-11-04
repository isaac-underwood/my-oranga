<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'user_id', 'name', 'start_date', 'end_date', 'goal'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
