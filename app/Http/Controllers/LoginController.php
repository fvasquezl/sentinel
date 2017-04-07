<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
   }

    public function postLogin(Request $request)
    {
        Sentinel::authenticate($request->all());
        return Sentinel::check();
   }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
   }
}
