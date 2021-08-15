<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class AddComment extends Controller
{
    //
    public function postcomment(Request $request){
        
        //`text`, `user_id`, `post_id`,
        $val= Validator :: make($request->all(),[
            'text'=> 'required',
            'user_id'=> 'required',
            'post_id'=> 'required'
        ]);
        if($val->fails()){
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]); 
        }
        $user=  new \App\Models\Comment();
        //dd($request->all()); 
        $user-> text =$request -> get('text');
        $user-> user_id=$request -> get('user_id');
        $user-> post_id =$request -> get('post_id');
        $user->save();
        return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]); 
    }
}
