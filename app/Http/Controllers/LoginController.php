<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;

class LoginController extends Controller
{
     


   public function signin(Request $request)

   {

    $this->validate($request, [
        'email'=> 'required',
        'password' => 'required',
    ]);

   // grab credentials from the request
   $credentials = $request->only('email', 'password');
   
            
               // attempt to verify the credentials and create a token for the user
               if (! $token = JWTAuth::attempt($credentials)) {
                   return response()->json(['error' => 'invalid_credentials'], 401);
               }
          
           // all good so return the token
           return response()->json(compact('token'));
       }

       


       public function me()
       {
           
       
               if (! $user = JWTAuth::parseToken()->authenticate()) {
                   return response()->json(['error' => 'user_not_found'], 404);
               }
       
           // the token is valid and we have found the user via the sub claim
           return response()->json(compact('user'));
       }

}
