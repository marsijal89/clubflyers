<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use App\User;
use Faker\Factory;
use DB;


class UserController extends Controller
{
     public function index( )

     {
        $user = DB::table('user')->select('uuid','firstName','lastName','profileImage','role','email')->get();
         
        return response()->json($user);
        
     }


     public function create(Request $request)

     {
         
            
                $file = $request->file('profileImage');
                $name = sha1(time()."-".$file->getClientOriginalName());
                Storage::put($name, File::get($file));

                $user = new User();
        
                $uuid = Factory::create()->uuid;
        
                $user->firstName = $request->firstName;
        
                $user->lastName = $request->lastName;
        
                $user->profileImage = $name;
        
                $user->role = $request->role;
        
                $user->email = $request->email;
        
                $user->password =  bcrypt($request->password);
        
                $user->uuid = $uuid;

                //$user->api_token = bcrypt($user->firstName.$user->email.$user->uuid);
        
                $user->save();

                return response()->json($user);

     }


      

    
}

