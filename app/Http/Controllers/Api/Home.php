<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User;
use App\Http\Resources\PostResource as PostResource;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $posts = \App\Models\Post::all();
       // return $this->sendResponse(PostResource::collection($posts), 'Posts retrieved Successfully!' );
            
       $users= \App\Models\User::with(relations:['Posts','Comments','Likes'])->get();
      return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$users]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function userPosts($id)
    {
    $posts = \App\Models\Post::where('user_id' , $id)->get();
    return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$posts ]); 
    //return $this->sendResponse(PostResource::collection($posts), 'Posts retrieved Successfully!' );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'description'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate Error',$validator->errors() );
        }

        $user = Auth::user();
        $input['user_id'] = $user->id;
        $post = Post::create($input);
       // return $this->sendResponse($post, 'Post added Successfully!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = \App\Models\Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found!' );
        }
     //   return $this->sendResponse(new PostResource($post), 'Post retireved Successfully!' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'description'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error' , $validator->errors());
        }


        if ( $post->user_id != Auth::id()) {
            return $this->sendError('you dont have rights' , $validator->errors());
        }
        $post->title = $input['title'];
        $post->description = $input['description'];
        $post->save();

      //  return $this->sendResponse(new PostResource($post), 'Post updated Successfully!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $errorMessage = [] ;

        if ( $post->user_id != Auth::id()) {
            return $this->sendError('you dont have rights' , $errorMessage);
        }
        $post->delete();
      //  return $this->sendResponse(new PostResource($post), 'Post deleted Successfully!' );

    
    }
}
