<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   /* public function show($id)
    {
        return new UserResource(User::find($id));
    }*/
     public function toArray($request)
    {
       // return parent::toArray($request);
        return[
            //'id'=>$this->id,
            //'text'=>$this->text,
            //'user'=>$this->user,
           // 'comment'=>$this->comment,
          //  'post_id' => \App\Models\Favorite::find(\App\Models\Post::find($this->post_id)),
           // 'user_id' => \App\Models\Favorite::find($this->user_id),
            
           'id' => $this->id,
           'text' => $this->text,
          'user'=>$this->user,
           'comment'=>$this->comment,
           'created_at'	=> $this->created_at->format('d/m/Y'),
           'updated_at'	=> $this->updated_at->format('d/m/Y'),
        ];
      //  $comments = Post::find(1)->comments;
            
    }
}
