<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Page;
use App\models\Image;
class Pages extends Controller
{
    public function about()
    {
        return view("pages.about")->with(['page' => Page::where('id', 1)->with('images')->first()]);
    }

    public function partners()
    {
        return view("pages.partners")->with(['page' => Page::where('id', 2)->with('images')->first()]);
    }

    public function sendMail()
    {
        request()->validate([
            'message' => 'required|regex:/^[a-zA-Z0-9\s]+$/'
        ]);

        mail('jokanovic.ignjat@gmail.com', 'Mejl sa shop sajta', request()->message);

    }

    public function author()
    {
        return view("pages.author");
    }

    public function contact()
    {
        return view("pages.contact");
    }

    public function combo()
    {
        return view('pages.pages_combo')->with(['pages'=>Page::all()]);
        
    }

    public function edit($id)
    {
      
        

        return view('pages.pages_edit')->with(['page'=>Page::where('id', $id)->with('images')->first()]);

        

    }

    public function updateContent()
    {
        request()->validate([
            'text' => 'required|regex:/^[a-zA-Z0-9\s]+$/'
        ]);

        $page = Page::find(request()->game_id);
        $page->content = request()->text;
        $page->update();
        session()->flash('success', 'Updated Content sucessfully');
        return redirect()->back();

    }

    public function updateImage()
    {
        request()->validate([
            'image' => 'required|mimes:jpeg,png'
        ]);
        $file = request()->image;
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/images', $name);
        $page = Page::find(request()->page_id);
        $page->updated_at = date("Y-m-d h:i:s");
        $page->update();
        $image = Image::find(request()->id);
        $image->src = 'images/'.$name;
        $image->alt = request()->alt;
        $image->update();
        session()->flash('success', 'Updated Image successfully');
        return redirect()->back();

    }



}
