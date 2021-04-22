<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'name'        => $this->name,
            'description' => $this->description,
            'city'        => $this->city,
            'state'       => $this->state,
            'address'     => $this->address,
            'phone'       => $this->phone,
            'experience'  => $this->experience,
            'badge_type'  => $this->badge_type,
            'likes'       => $this->likes,
            'video_link'  => $this->video_link,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            'slug'        => $this->slug,
            'provider'    => $this->user,
            'category'    => new CategoryResource($this->category),
            'images'      => ImageResource::collection($this->images),
            'comments'      => $this->comments,
        ];

    }

    public function with($request)
    {
        return [
            'api' => [
                'version' => '1.0',
                'date' => date('d M Y'),
                'developer' => 'EF Network',
                'attribution' => url('https://efcontact.com')
            ],
        ];
    }
}
