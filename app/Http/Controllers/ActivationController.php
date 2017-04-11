<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($email,$activationCode)
    {
        $user = User::whereEmail($email)->first();

        $sentinelUser = Sentinel::findById($user->id);

        if(Activation::complete($sentinelUser,$activationCode))
        {
            return redirect('\login');
        } else {

        }
    }
}
