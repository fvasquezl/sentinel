<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
   }

    public function postLogin(Request $request)
    { //
        try {
            if (Sentinel::authenticate($request->all())){
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if($slug == 'admin')
                {
                    return redirect('/earnings');
                }
                elseif($slug == 'manager')
                {
                    return redirect('/tasks');
                }
            }else{
                return redirect()->back()->with(['error' => 'Wrong Credentials']);
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "Your are banned for $delay seconds."]);
        }catch (NotActivatedException $e){
            return redirect()->back()->with(['error' => "Your account is not activated."]);
        }
   }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
   }
}
