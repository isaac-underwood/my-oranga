<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    
    protected $fillable = [
        'user_id', 'nutrition_id', 'item', 'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
