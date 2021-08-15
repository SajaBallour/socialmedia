<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class Profile extends Controller
{
    //
    public function profile($id=null){
        $user = (isset($id))? \App\Models\User::find($id):auth()->user();
        return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]);
        
    }
}
