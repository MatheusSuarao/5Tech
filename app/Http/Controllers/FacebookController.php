<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {
        // Faça o que precisar com os dados do usuário retornado pelo Facebook

        $facebookUser = Http::get("https://graph.facebook.com/me? fields=id,name,email&access_token=$request->access_token")->json(); // Will return id, name and email (if your facebook registered with an email)

        if(empty($facebookUser['email']))
            return response()->json(['error' => "Your Facebook account doesn\'t have a registered email or the email information is missing."], 400);
       
         $facebookUserId = $facebookUser['id'];
         $profilePhoto = "https://graph.facebook.com/v3.3/$facebookUserId/picture?type=normal";
       

        try {
    
            $user = Socialite::driver('facebook')->user();
            $existingUser = User::where('fb_id', $user->id)->first();
     
            if($existingUser){
                Auth::login($existingUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt($user->password)
                ]);
    
                Auth::login($createUser);
                return redirect('/dashboard');
            }
    
        } catch (\Throwable $th) {
          throw $th;
       }
    }

}
