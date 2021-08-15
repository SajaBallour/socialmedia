<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class EditUser extends Controller
{
    //
    public function putUser(Request $request){
        $val= Validator :: make($request->all(),[
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:6'
        ]);
        if($val->fails()){
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]); 
        }
        $user=  \App\Models\User::find(auth()->user()->id); 
        $user-> name =$request -> get('name');
        $user-> email=$request -> get('email');
        $user-> password =$request -> get('password');
        $user->save();
       return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]); 

    }
}
