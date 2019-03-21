<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Role;
use App\models\Game;
use \Validator;
class UsersController extends Controller
{

    public function store()
    {
        request()->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|alpha_num|min:3|unique:users,username',
            'password' => 'required|alpha_num|min:3',
        ]);

        
            try{
                $hash = md5(request()->username);
                $role = Role::where('name', 'user')->first();
                $user = new User();
                $user->username = request()->username;
                $user->password = md5(request()->password);
                $user->email = request()->email;
                $user->activation_key = $hash;
                $user->active = false;
                $user->role_id = $role->id;
                $user->save();
                mail(request()->email, 'Please activate your account', "<p>Please click<a href='https://lucky-8-shop.000webhostapp.com/activate/$hash'>Here</a>To activate your account</p>");
                return response()->json('An activation email has been sent to your email');
            }
            catch(Exception $e)
            {
                Log::error('msg', $e->getMessage());
            }
            
        

    }

    public function activate($hash)
    {
        $user = User::where('activation_key', $hash)->first();
        if($user != null)
        {
            if($user->active == true)
            {
                $msg = 'You already activated your account';
                return view('pages.activation')->with('msg', $msg);

            }
            else{

                $msg = 'Thank you for activating your account';
                $user->active = true;
                $user->update();
                return view('pages.activation')->with('msg', $msg);


            }
            

        }
        else{
            $msg = 'User not found';
            return view('pages.activation')->with('msg', $msg);


        }
        
    }

    public function login()
    {
        request()->validate([
            'username' => 'required|alpha_num|min:3',
            'password' => 'required|alpha_num|min:3',
        ]);

        try{
            $user = User::where(['username' => request()->username, 'password' => md5(request()->password)])->with('role')->first();

            if($user != null)
            {
                session()->put('user', $user);
                return response(200);

            }
            else{
                return response()->json('Invalid username or password', 500);
            }

        }
        catch(Exception $ex)
        {
            Log::error('msg', $ex->getMessage());
        }


    }

    public function logout()
    {

        session()->forget('user');
        session()->flush();
        return redirect('/');
        
    }

    public function rate()
    {
        if(session()->has('user'))
        {
            $user = session('user');
            if(!$user->active)
            {
                return response()->json("<div class='alert alert-danger'>You must activate your account before rating</div>", 500);
            }
            else{
                $game = Game::find(request()->id);
                //dd(session('user')->id);
                $id_user =  session('user')->id;
                if($game->users->contains($id_user))
                {
                    return response()->json("<div class='alert alert-danger'>You already rated this game</div>", 500);
                }
                else{

                    $game->users()->attach($id_user, ['grade'=> request()->grade]);
                    return response()->json("<div class='alert alert-success'>Thank you for rating this game</div>", 200);
                }

            }

            //return response()->json("<div class='alert alert-success'>Thank you for voting</div>", 200);

        }
        else
        {
            return response()->json("<div class='alert alert-danger'>You must be logged in to rate</div>", 500);
        }
    }

    public function addToCart()
    {
        if(session()->has('user'))
        {
            if(!session('user')->active)
            {
                return response()->json("<div class='alert alert-danger'>Please activate your account</div>", 500);
            }
            else
            {
                $user = User::find(session('user')->id);
                $id_game = request()->id;
                if($user->cart->contains($id_game))
                {

                    
                    return response()->json("<div class='alert alert-danger'>You are allowed to buy only one game per session</div>", 500);
                }
                else{

                    $user->cart()->attach($id_game);
                    $new_user = User::find(session('user')->id);
                    $number = count($new_user->cart);
                    return response()->json($number, 200);
                }


            }
            

        }
        else
        {
            return response()->json("<div class='alert alert-danger'>You must be logged in to add to cart</div>", 500);
        }

    }

    public function showCart()
    {
        $items = User::where('id', session('user')->id)->with('cart')->first();
        return view('components.regular.cart', compact('items'));
    }

    public function removeItem()
    {
        $user = User::find(session('user')->id);
        $user->cart()->detach(request()->id);
        $items = User::where('id', session('user')->id)->with('cart')->first();
        return view('components.regular.cart', compact('items'));
    }

    public function updateNumber()
    {
        $new_user = User::find(session('user')->id);
        $number = count($new_user->cart);
        return response()->json($number, 200);

    }

    public function getDownload()
    {
        $file= public_path()."/favicon.ico";

        $headers = array(
                'Content-Type: application/pdf',
                );

        return response()->download($file, 'dokumentacija.pdf', $headers);
    }

    public function checkout()
    {
        $user = User::where('id', session('user')->id)->with('cart')->first();
        $user1 = User::find(session('user')->id);
        foreach($user->cart as $c)
        {
            $user1->history()->attach($c->id);
            $user1->cart()->detach($c->id);
        }

        return response()->json("<div class='alert alert-success'><h1>Demo completed</h1></div>", 200);
    }
    
}
