<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Genre;
use App\models\Game;
use App\models\Activity;
use App\models\Info;
use App\models\Page;
use App\models\User;
class StatisticsController extends Controller
{
    public function orders()
    {
        $users = User::with('history', 'games')->get();
        // $reviews = count($users->games);
        // $orders = count($users->history);
        return view('pages.orders')->with(['users' => $users]);

    }

    public function logins()
    {
        $users = User::with('history', 'games')->get();
        return view('pages.logins')->with(['users' => $users]);

    }

    public function registrations()
    {
        $users = User::with('history', 'games')->get();
        return view('pages.registrations')->with(['users' => $users]);
    }

    public function reviews()
    {
        $users = User::with('history', 'games')->get();
        return view('pages.reviews')->with(['users' => $users]);
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
