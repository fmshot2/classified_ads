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
            'sender_name'      => $this->sender_name == null ? '' : $this->sender_name,
            'sender_email'     => $this->sender_email == null ? '' : $this->sender_email,
            'sender_phone'     => $this->sender_phone == null ? '': $this->sender_phone,
            'message'          => $this->message,
            'service_name'     => $this->service->name,
            'created_at'       => $this->created_at,
        ];
    }
}
