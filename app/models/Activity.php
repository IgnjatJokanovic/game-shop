<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function info()
    {
        return $this->belongsTo('App\models\Info');
    }
}
