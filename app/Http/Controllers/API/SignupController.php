<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\reader;
use Validator;
class SignupController extends Controller
{
    //
    public function signup(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'userName'          => 'required',
            'password'          => 'min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'   => 'min:6',
            'email'             => 'required'

        ]);


        if($validator->fails()){
            return response()->json(['Validation Error.'=> $validator->errors()]);
        }

        // dd($input);
        $reader = reader::create(
            [
                 'userName'=>$input["userName"],
                 'password'=>$input["password"],
                 'confirmPassword'=>$input["confirmPassword"],
                 'email'=>$input["email"],
                 'api_token'=>str_random(60)
            ]
       );

        // dd($reader);
         return response()->json(["data"=>$reader, "message"=>'reader created successfully.'], 200);
    }
    public function login(request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'email'             => 'required',
            'password'          => 'min:6|required'


        ]);
        $user  =reader::where( 'email',$input['email'])->first();

        if($input['password']==$user->password)
            {
                return response()->json(["data"=>$user->api_token, "message"=>'reader log in successfully.'], 200);
            }
        else {
            return response()->json(['Validation Error.'=> $validator->errors()]);
        }
    }
}
