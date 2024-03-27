<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\socialite;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Exception;

class GoogleController extends Controller
{
    public function googlepage(){

        return socialite::driver('google')->redirect();
    }

    public function googlecallback(){

        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('email', $user->email)->first();
       
            if($finduser)

            {
       
                Auth::login($finduser);
      
                return redirect()->intended('/dashboard');
       
            }

            else

            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => '',
                    'google_id'=> $user->id,
                    'password' => encrypt($user->password)
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('/dashboard');
            }
      
        } 
        
        catch (Exception $e) {
            dd($e->getMessage());
        }
        
    }





}
