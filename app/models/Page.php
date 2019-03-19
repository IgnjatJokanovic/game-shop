<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
