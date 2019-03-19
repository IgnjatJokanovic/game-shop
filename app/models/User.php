<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo('App\models\Role');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'user_game')->withPivot('grade');
    }
}
