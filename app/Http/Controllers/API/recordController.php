<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\reader;
use Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class recordController extends Controller
{
    public function store(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'api_token'=>'required'|'min:0'|'max:6',
            'index' => 'required',
            'record' =>'required|mimes:wav'
            //'record' => 'required|file|mimes:mpeg,mpga,mp3,wav'

        ]);
        $file = $request->file('record');
        $destinationPath = public_path() . '/uploads/records/';
        $extension = $file->getClientOriginalExtension();
        $name = time() . '' . rand(11111, 99999) . '.' . $extension;
        $file->move($destinationPath, $name);
        $reader =  reader::where('api_token' , $request->api_token)->first();
        $sent_to_script= $reader->record()->create(['URL' => '/uploads/records/' . $name, 'index' =>$request->index]);
        //return $sent_to_script->URL;
        $client = new \GuzzleHttp\Client();
        //$result = $client->get('http://127.0.0.1:5000/'.$sent_to_script->index.'/'.$sent_to_script->record);
        //$response = $client->request('GET', 'http://127.0.0.1:5000/2/Al_fatihah_FoadAlKhamere_0_0.wav');//.$sent_to_script->index.'/'.$sent_to_script->record);
        $url = realpath(".$sent_to_script->URL .");
        //return $url ;
        $result = $client->get('http://127.0.0.1:5000/'.$sent_to_script->index."/".$url);

        echo $result->getBody();

        //echo gettype($response->getBody());


 }
}
