<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller
{
    public function about()
    {
        return view("pages.about");
    }

    public function partners()
    {
        return view("pages.partners");
    }

    public function author()
    {
        return view("pages.author");
    }

    public function contact()
    {
        return view("pages.contact");
    }



}
