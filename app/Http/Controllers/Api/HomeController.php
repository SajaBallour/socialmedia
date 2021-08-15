<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User;
use App\Http\Resources\User as PostResource;
class HomeController extends Controller
{
    //
   /* public function home($id=null){

        $posts = $user->with(['Likes.Post'])->get();
     }*/
     public function index(Request $request, $id)
     {
          // find a give user from
          // eloquent user model
          $user = \App\Models\User::find($id);
          
          // pass this single user object
          // to user resource remember resource
          // deals with single eloquent model or row in database
          return new \App\Http\Resources\PostResource($user);
     }
}
