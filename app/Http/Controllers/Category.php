<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Genre;
use App\models\Activity;
use App\models\Info;
class Category extends Controller
{
    public function combo()
    {
        return view('pages.category_combo')->with('categories', Genre::all());

    }

    public function insert()
    {
        return view('pages.category_insert');
    }

    public function store()
    {
        request()->validate(['name'=>'required|unique:genres|regex:/^[a-zA-Z0-9\s]+$/']);
        $genre = new Genre();
        $genre->name = request()->name;
        if($genre->save())
        {
            session()->flash('success', 'Successfully inserted new category'); 
        }
        else
        {
            session()->flash('errors', 'Failed to insert category');
        }
        return redirect()->back();
        

    }

    public function update()
    {
        request()->validate(['name'=>'required|unique:genres|regex:/^[a-zA-Z0-9\s]+$/']);
        $genre = Genre::find(request()->id);
        $genre->name = request()->name;
        if($genre->update())
        {
            session()->flash('success', 'Successfully updated category'); 
        }
        else
        {
            session()->flash('errors', 'Failed to update category');
        }
        return redirect()->back();


    }

    public function destroy()
    {
        $genre = Genre::find(request()->id);
        $name = $genre->name;
        if($genre->delete())
        {
            session()->flash('success', 'Successfully deleted category');
            $activity = new Activity();
            $activity->msg = "$name";
            $activity->info_id = Info::where('name', 'category')->first()->id;
            $activity->save();
        }
        else
        {
            session()->flash('errors', 'Failed to delete category');
        }
        return redirect()->back();
    }
}
