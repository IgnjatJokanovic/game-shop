<?php

namespace App\Http\Controllers;
use App\models\Genre;
use App\models\Image;
use App\models\Game;
use App\models\Activity;
use App\models\Info;

use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;

class Games extends Controller
{

    public function index()
    {
        $games = Game::with('genres', 'images')->paginate(6);
        $genres = Genre::has('games')->get();
        if (request()->ajax())
        { 
            return view('components.regular.ajaxGames', ['games' => $games]); 
            
        }
        return view('pages.home')->with(['games' => $games, 'genres' => $genres]);

    }

    public function show($id)
    {

        $game = Game::where('id', $id)->with('images', 'genres', 'users')->first();
        if(!$game->users->isEmpty())
        {
            $sum = 0;
            foreach($game->users as $r)
            {
                $sum += $r->pivot->grade;
            }
            $rating = round($sum/count($game->users));

        }
        else
        {
            $rating = 0;
        }
       
        return view("pages.single_game")->with(['game'=>$game, 'rating' => $rating]);

    }

    public function search()
    {
        $name = request()->name;
        $games = Game::where('title', 'like', "%$name%")->get();
        if($name=='')
        {
            echo "";
        }
        else{

            if($games->isEmpty())
            {
                echo "<li>Nothing found</li>";
            }
            else{
                //echo "Pickica";
                return view('components.regular.ajaxSearch')->with(['games'=>$games]);
            }

        }
        
        
        
    }

    public function perCategory()
    {
        $games = Game::whereHas('genres', function ($query) {
            $query->where('genres.id', request()->id);
        })->paginate(6);

        return view('components.regular.ajaxGames')->with(['games' => $games]);

    }
    public function insert()
    {
        
        return view('pages.insert_game')->with(['categories'=>Genre::all()]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'price' => 'numeric',
            'picture' => 'required|mimes:jpeg,png',
            'galery.*' => 'required|mimes:jpeg,png',
            'galery' => 'required|min:5|max:5',
            'category' => 'required'
        ];
    
        $msgs = [
            'mimes' => 'Image must be in image format',
            'min' => 'Galery must contain 5 images',
            'max' => 'Galery must contain 5 images'
        ];
    
        request()->validate($rules, $msgs);

        try{
            $img = new Image();
            $file = request()->file('picture');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images', $name);
            $img->src = 'images/'."$name";
            $img->alt = request()->title;
            $img->save();
            $game = new Game();
            $game->title = request()->title;
            $game->price = request()->price;
            $game->save();
            $game->images()->attach($img->id);
            foreach(request()->category as $c)
            {
                $game->genres()->attach($c);
            }
            foreach(request()->galery as $g)
            {
                $image = new Image();
                $upload = time().$g->getClientOriginalName();
                $g->move(public_path().'/images', $upload);
                $image->src = 'images/'.$upload;
                $image->alt = request()->title;
                $image->save();
                $game->images()->attach($image->id);
            }

            session()->flash('success', 'Inserted game sucessfully');
            return redirect()->back();


        }
        catch(Exception $e){
            Log::error('msg', $e->getMessage());
        }
       


        
    }

    public function combo()
    {
        return view('pages.game_combo')->with(['games' => Game::all()]);
    }

    public function delete()
    {
        try{

            $game = Game::find(request()->id)->with('images')->first();
            $galery = $game->images;
            $activity = new Activity();
            $activity->msg = $game->title;
            $activity->info_id = Info::where('name', 'games')->first()->id;
            $activity->save();
            $game->delete();
            foreach($galery as $g)
            {
                $image = Image::find($g->id)->first();
                $image->delete();
            }
    
            session()->flash('success', 'Deleted game sucessfully');
            return redirect()->back();

        }
        catch(Exception $e)
        {
            Log::error('msg', $e->getMessage());
        }
       

    }

    public function edit($id)
    {
        $game = Game::find($id)->with('images', 'genres')->first();
        $present_genres = array();
        foreach($game->genres as $g)
        {
            array_push($present_genres, $g->id);
        }
        return view('pages.game_edit')->with(['game'=> $game, 'genres'=>Genre::all(), 'present' =>  $present_genres]);

    }

    public function updateBasic()
    {
        request()->validate([
            'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'price' => 'numeric',
        ]);

        $game = Game::find(request()->game_id)->with('images')->first();
        $game->title = request()->title;
        $game->price = request()->price;
        $game->update();
        foreach($game->images as $i)
        {
            $image = Image::find($i->id);
            $image->alt = request()->title;
            $image->update();
        }

        session()->flash('success', 'Successfully updated game');
        return redirect()->back();



    }

    public function updateGalery()
    {
        $rules = [

            'galery' => 'required|mimes:jpeg,png',
        ];
    
        $msgs = [
            'mimes' => 'Image must be in image format'
        ];
    
        request()->validate($rules, $msgs);
        $game = Game::find(request()->game_id);
        $game->updated_at = date("Y-m-d h:i:s");
        $game->update();
        $file = request()->galery;
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/images', $name);
        $image = Image::find(request()->id);
        $image->src = 'images/'.$name;
        $image->update();
        session()->flash('success', 'Updated galery image successfully');
        return redirect()->back();




    }

    public function UpdateCategory()
    {

        $game = Game::find(request()->game_id);
        $action = request()->action;
        $game->updated_at = date("Y-m-d h:i:s");
        $game->update();
        switch ($action){

            case 'remove':
                $game->genres()->detach(request()->category);
                session()->flash('success', 'Removed Category from game successfully');
                break;
            case 'add':
                $game->genres()->attach(request()->category);
                session()->flash('success', 'Added Category to game successfully');
                break;
        }

        return redirect()->back();


    

    }

    public function updateImage()
    {
        $rules = [
            'picture' => 'required|mimes:jpeg,png'
        ];
    
        $msgs = [
            'mimes' => 'Image must be in image format'
        ];
    
        request()->validate($rules, $msgs);

        $game = Game::find(request()->game_id);
        $game->updated_at = date("Y-m-d h:i:s");
        $game->update();

        $file = request()->picture;
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/images', $name);
        $image = Image::find(request()->id);
        $image->src = 'images/'.$name;
        $image->update();
        session()->flash('success', 'Updated main image successfully');
        return redirect()->back();

       

    }

    public function activity()
    {



    }

 
}
