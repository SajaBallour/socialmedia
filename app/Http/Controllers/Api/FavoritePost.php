<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FavoritePost extends Controller
{
    //
    public function favouritePost($id = null){

        if(isset($id))
            $favourite = \App\Models\Favorite::with(relations:'Posts')->get()->first();
            //$users= \App\Models\User::with(relations:'Posts')->get();
        else
            $favourite= \App\Models\Favorite::where('user_id',Auth::user()->id )->get()->first();
        return response()->json(['status'=>true,'message'=> trans('admin.success'),'items'=>$favourite]);

    }   
}
