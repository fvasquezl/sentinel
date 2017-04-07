<?php

namespace App\Http\Controllers;


use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postRegister(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());

        return redirect('/');
    }

}
