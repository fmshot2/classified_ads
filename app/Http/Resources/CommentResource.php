<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id'               => $this->id,
            'user_id'          => $this->user_id,
            'service_id'       => $this->service_id,
            'parent_id'        => $this->parent_id,
            'comment'          => $this->comment,
            'commentable_id'   => $this->commentable_id,
            'commentable_type' => $this->commentable_type,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
            'user'             => new UserResource($this->user),
            // 'image'          => route('home') . '/uploads/sliders/' . $this->image
        ];
    }
}
