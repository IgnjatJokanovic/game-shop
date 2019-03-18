<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{


    protected $guarded = [];

    public function games()
    {
        return $this->belongsToMany('App\models\Game');
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
    
}
