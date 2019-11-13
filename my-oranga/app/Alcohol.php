<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alcohol extends Model
{
    protected $fillable = [
        'user_id', 'nutrition_id', 'date', 'item', 'standard_drink'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
