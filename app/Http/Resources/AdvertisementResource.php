<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
            'id' => $this->id,
            'brand_name' => $this->brand_name,
            'website_link' => $this->website_link,
            'banner_img' => route('home') . '/uploads/sponsored/'.$this->banner_img,
            'client_name' => $this->client_name,
            'client_email' => $this->client_email,
            'client_phone' => $this->client_phone,
            'client_address' => $this->client_address,
            'advert_location' => $this->advert_location,
            'location_name' => $this->location_name,
            'advert_location' => $this->advert_location,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
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
