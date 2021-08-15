<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeLine extends Controller
{
    //
    //
    public function timeline(Request $request){
        $limit = 10 ;
        $currentPage = $request->currentPage;
        $count = \App\Models\Post::count();
 
        $offset = ($currentPage - 1) * $limit;
        $numberOfPages = (int) ceil($count / $limit);
        // return response()->json($numberOfPages );
 
         $data = \App\Models\Post::skip($offset)->take($limit)->get();
 
         return response()->json($data);
     }

}
