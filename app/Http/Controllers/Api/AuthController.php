<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Auth;


class AuthController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $success['token'] =  $user->createToken('revolver')->accessToken;
            $success['user']=$user;
            return response()->json($success, $this->successStatus);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function register(Request $request)
    {
        $rules = array('email' => 'required|string|email|max:255|unique:users',);
        $v = Validator::make($request->all(),$rules);
         if ($v->fails()) {
           
            $errors = array('error'=>'cet email est déjà utilisé ! ');
            return response()->json($errors,$this->successStatus);

            
        }
        $input = $request->all();
        
        
                    $user= User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'fname' => $input['fname'],
                    'position' => $input['position'],
                    'tva' => $input['tva'],
                    'societe' => $input['societe'],
                    'phone' => $input['phone'],
                    ]);
                

         

            while(!$user->id) {}
        
    
            $success=$user;
            $success['token'] =  $user->createToken('revolver')->accessToken;
            return response()->json(['success'=>$success], $this->successStatus);
    }
    
}


