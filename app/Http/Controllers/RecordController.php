<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'index' => 'required',
            'file' => 'required|file|mimes:' . File::getAllExtensions() . '|max:' . File::getMaxSize(),
            'Fileaudio' =>'nullable|mimes:audio/mpeg,mpga,mp3,wav,aac'
        ]);
//   All files       /
   $file = new File();
  $index = $request->index;
  $uploaded_file = $request->file('file');
  $filename = $uploaded_file->getClientOriginalName();
  $original_ext = $uploaded_file->getClientOriginalExtension();
  $type = $file->getType($original_ext);
  $filepath = $uploaded_file->storeAs('public/upload/files/',$filename);
  $files = URL::asset('storage/upload/files/' . $filename);
  $description = $request->description;
  $user_id = Auth::user()->id;
/////////// Audio at null    /////////////////
     $Fileaudio = $request->file('audio');
     $audioname = $Fileaudio->getClientOriginalName();
     $audiopath =$Fileaudio->storeAs('public/upload/files/audio/', $audioname);

  //return $audiopath;
   dd($request->all());

 }

}
