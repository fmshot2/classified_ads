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
            'name' => $this->name,
            'description' => $this->description,
            'city' => $this->city,
            'state' => $this->state,
            'address' => $this->address,
            'phone' => $this->phone,
            'experience' => $this->experience,
            'video_link' => $this->video_link,
            'slug' => $this->slug,
            'category' => $this->category,
            'images' => ImageResource::collection($this->images)
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
