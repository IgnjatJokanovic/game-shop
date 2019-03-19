<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function games()
    {
        return $this->belongsToMany('App\models\Game');
    }
}
