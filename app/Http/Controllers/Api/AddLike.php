<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class AddLike extends Controller
{
    //
    public function postlike(Request $request){
        
        // `user_id`, `type`, `type_id`
        $val= Validator :: make($request->all(),[
            'type'=> 'required',
            'user_id'=> 'required',
            'type_id'=> 'required'
        ]);
        if($val->fails()){
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]); 
        }
        $user=  new \App\Models\Like();
        //dd($request->all()); 
        $user-> type =$request -> get('type');
        $user-> user_id=$request -> get('user_id');
        $user->type_id =$request -> get('type_id');
        $user->save();
        return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]); 
    }
}
