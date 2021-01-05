<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return redirect('/room');
    }

    public function checklogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return Redirect::to('/')->with('form_require', 'Fill the credentials please.');
        }

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        $remember = $request->get('remember') == "on" ? true : false;
        if (!Auth::attempt($user_data, $remember)) {
            return Redirect::to('/')->with('login_error', 'Wrong Credentials!');
        }

        return redirect('/room');
    }
}
