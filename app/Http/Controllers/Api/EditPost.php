<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class EditPost extends Controller
{
    //
    public function putposts(Request $request){
        $val= Validator :: make($request->all(),[
            'text'=> 'required',
         //   'user_id'=> 'required'
            
        ]);
        if($val->fails()){
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]); 
        }
        $user=  \App\Models\Post::find(auth()->user()->id);
        $user-> text =$request -> get('text');
       // $user-> user_id=$request -> get('user_id');
        $user->save();
       return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]); 

    }
}
