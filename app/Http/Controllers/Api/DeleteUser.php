<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
class DeleteUser extends Controller
{
    //
    public function deleteUser(Request $request){
        $user=  \App\Models\User::find($request->get('user_id'));
        if(isset($user)){
            $user->delete();
        return response()-> json(true);
    }return response()-> json(false);
}
}
