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
        return [
            'id'                  => $this->id,
            'name'                => $this->name,
            'description'         => $this->description == null ? '' : $this->description,
            'city'                => $this->city == null ? '' : $this->city,
            'state'               => $this->state == null ? '' : $this->state,
            'address'             => $this->address == null ? '' : $this->address,
            'phone'               => $this->phone == null ? '' : $this->phone,
            'experience'          => $this->experience == null ? 0 : $this->experience,
            'badge_type'          => $this->badge_type,
            'total_likes'         => $this->likes->count(),
            'likes'               => $this->likes,
            'min_price'           => $this->min_price == null ? '' : $this->min_price,
            'video_link'          => $this->video_link == null ? '' : $this->video_link,
            'is_featured'         => $this->is_featured,
            'longitude'           => $this->longitude == null ? '' : $this->longitude,
            'latitude'            => $this->latitude == null ? '' : $this->latitude,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
            'slug'                => $this->slug,
            'status'              => $this->status,
            'thumbnail'           => $this->thumbnail ? route('home') . '/uploads/services/' . $this->thumbnail : route('home') . '/uploads/services/noserviceimage.png',
            'is_approved'         => $this->is_approved,
            'subscription_end_date' => $this->subscription_end_date == null ? '' : $this->subscription_end_date,
            'views'               => $this->views->count(),
            'provider'            => new UserResource($this->user),
            'category'            => new CategoryResource($this->category),
            'sub_categories'      => CategoryResource::collection($this->sub_categories),
            'images'              => ImageResource::collection($this->images),
            'client_feedbacks'    => ClientsFeedback::collection($this->comments),
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
