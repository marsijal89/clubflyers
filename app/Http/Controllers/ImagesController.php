<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
 
class ImagesController extends Controller
{
    public function saveFile(Request $request) //save image in database
    {
        
        $file = $request->file('image');
        $name = sha1(time()."-".$file->getClientOriginalName());
        Storage::put($name, File::get($file));

        $image = new Images;

        $image->projectId = $request->projectId;

        $image->image = $name;

        $image->save();
 
        return response()->json($name);
    }

    public function viewFile($name){ // view name file
        
               return response()->make(Storage::get($name), 200, [
                   'Content-Type' => Storage::mimeType($name),
                   'Content-Disposition' => 'inline; '.$name,
               ]);
        
           }
}
