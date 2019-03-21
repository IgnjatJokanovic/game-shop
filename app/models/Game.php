<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function images()
    {
        return $this->belongsToMany('App\models\Image');
    }

    public function genres()
    {
        return $this->belongsToMany('App\models\Genre');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_game')->withPivot('grade');
    }

    public function cart()
    {
        return $this->belongsToMany(User::class, 'cart');
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'buy_histories');
    }
}
