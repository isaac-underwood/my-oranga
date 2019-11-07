<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    protected $fillable = [
        'kj', 'calories'
    ];

    public function snacks()
    {
        return $this->hasMany('App\Snack');
    }

    public function alcohols()
    {
        return $this->hasMany('App\Alcohol');
    }
}
