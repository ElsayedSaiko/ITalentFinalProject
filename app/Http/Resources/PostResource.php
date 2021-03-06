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
    public function toArray($request)
    {
        return [

            'post_id' => $this->id ,
            'user_id' => $this->user_id,
            'content' => $this->body,
            'profile_image' => $this->image,




        ];

    }
}
