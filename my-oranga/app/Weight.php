<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = [
        'user_id', 'kg', 'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
