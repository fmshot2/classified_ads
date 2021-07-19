<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientsFeedback extends JsonResource
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
            'id'                => $this->id,
            'user_id'           => $this->user_id,
            'parent_id'         => $this->parent_id == null ? '' : $this->parent_id  + 0,
            'comment'           => $this->comment,
            'service_id'        => $this->commentable_id,
            'commentable_type'  => $this->commentable_type,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'user'              => new UserResource($this->user),
            'service'           => new ServiceResource($this->service),
            'replies'           => ClientsFeedback::collection($this->replies)
        ];
    }
}
