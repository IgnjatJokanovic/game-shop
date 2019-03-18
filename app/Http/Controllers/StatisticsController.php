<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Genre;
use App\models\Game;
use App\models\Activity;
use App\models\Info;
Use App\models\Page;
class StatisticsController extends Controller
{
    public function orders()
    {
        return view('pages.orders');

    }

    public function logins()
    {
        return view('pages.logins');

    }

    public function registrations()
    {
        return view('pages.registrations');
    }

    public function reviews()
    {
        return view('pages.reviews');
    }

    public function categories()
    {
        $genres = Genre::all();
        $deletes = Info::with('activities')->where('name', 'category')->first();
        return view('pages.category_activity')->with(['genres'=>$genres, 'deletes'=>$deletes]);
    }

    public function games()
    {
        $games = Game::all();
        $deletes = Info::with('activities')->where('name', 'games')->first();
        return view('pages.game_activity')->with(['games'=>$games, 'deletes'=>$deletes]);
    }

    public function pages()
    {
        $pages = Page::all();
        return view('pages.pages_activity')->with(['pages' => $pages]);
    }
}
