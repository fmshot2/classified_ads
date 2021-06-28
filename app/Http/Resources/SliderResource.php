<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'id'             => $this->id,
            'title'          => $this->title,
            'details'        => $this->details,
            'website_link'          => $this->website_link == null ? '' : $this->website_link,
            'buttonlocation' => $this->buttonlocation,
            'buttontext'     => $this->buttontext,
            'image'          => route('home') . '/uploads/sliders/' . $this->image
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
