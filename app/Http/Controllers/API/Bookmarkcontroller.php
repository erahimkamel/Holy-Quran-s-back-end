<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\bookmark;
use App\reader;

class Bookmarkcontroller extends Controller
{
    public function user_bookmark(request $request)
    {
        $input = $request->all();
        $validator =Validator::make($input,[
            'name_surah'      =>'required',
            'number_of_surah' =>'required',
            'api_token'       =>'required'
        ]);


        if($validator->fails()){
            return response()->json(['Validation Error.'=> $validator->errors()]);
        }
        $api_token =reader::where('api_token',$input['api_token'])->get();
        dd($api_token);
        if(!$api_token==null)
        {
         return "this user do es not exist ";
        }
        else{
            $bookmark =bookmark::create(
                [
                        ' name_surah'=>$input["name_surah"],
                    'number_of_surah'=>$input['number_of_surah'],
                          'api_token'=>$input['api_token']
                ]

                        );
                        return response()->json(["data"=>$bookmark, "message"=>"reader's bookmark ."], 200);
        }



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
