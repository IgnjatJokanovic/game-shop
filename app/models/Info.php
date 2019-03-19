<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public function activities()
    {
        return $this->hasMany('App\models\Activity');
    }
}
