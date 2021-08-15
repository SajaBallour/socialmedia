<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    //migenation -> timeline
    public function getUser($user_id=null){
        if(isset($user_id))
        {
            $user= \App\Models\User::find($user_id);
        }else
            $user= auth()->user();
            return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]); 
        
    }
    /*/
    public function getcomment($user_id=null){
        if(isset($user_id))
        {
            $user= \App\Models\Comment::find($user_id);
        }else
            $user= auth()->user();
            return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]); 
        
    }*/


  
}
