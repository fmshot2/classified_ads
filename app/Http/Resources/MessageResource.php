<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'message'          => $this->message,
            'receiver_id'      => $this->receiver_id == null ? '' : $this->receiver_id,
            'sender_name'      => $this->sender_name == null ? '' : $this->sender_name,
            'sender_email'     => $this->sender_email == null ? '' : $this->sender_email,
            'sender_phone'     => $this->sender_phone == null ? '': $this->sender_phone,
            'read_at'          => $this->read_at,
            'slug'             => $this->slug == null ? '' : $this->slug,
            'service_user_id'  => $this->service_user_id == null ? '' : $this->service_user_id,
            'status'           => $this->status,
            'service_id'       => $this->service_id == null ? '' : $this->service_id,
            'parent_id'        => $this->parent_id == null ? 0 : $this->parent_id,
            'message_id'       => $this->messageable_id,
            'message_type'     => $this->messageable_type,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
            'user'             => new UserResource($this->user),
            'service'          => new ServiceResource($this->service),
            'message_replies'  => MessageResource::collection($this->replies),
        ];
    }
}
