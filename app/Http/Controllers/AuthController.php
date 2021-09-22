<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login($user,$pass){
       
        $result = User::find($user);//->where('pass','=',$pass)
        if($result){
             if(Hash::check($pass,$result->pass)){
                return response()->json([
                 'auth'=> true,
                 'user'=>$result,
                 'token'=>JWT::create($result,env('JWT_SECRET','2Zskxvy1Ya7BJrffaAd732WZG09Gl3gl'))
                ],200);
             }else{
                return response()->json(['status'=>'failed'], 404);
             }
        }else{
            return response()->json(['status'=>'failed'], 404);
        }
        
    }
}
