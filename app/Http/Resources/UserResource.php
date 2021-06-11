<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id"                 => $this->id,
            "name"               => $this->name,
            "role"               => $this->role,
            "is_ef_marketer"     => $this->is_ef_marketer,
            "email"              => $this->email,
            "email_verified_at"  => $this->email_verified_at,
            "image"              => $this->image ? route('home') . '/uploads/users/' . $this->image : route('home') . '/uploads/users/nouserimage.png',
            "phone"              => $this->phone,
            "about"              => $this->about,
            "address"            => $this->address,
            "state"              => $this->state,
            "slug"               => $this->slug,
            "refererLink"        => $this->refererLink,
            "idOfReferer"        => $this->idOfReferer,
            "refererAmount"      => $this->refererAmount,
            "status"             => $this->status,
            "badges"             => $this->badges,
            "bank_name"          => $this->bank_name,
            "account_number"     => $this->account_number,
            "account_name"       => $this->account_name,
            "badgetype"          => $this->badgetype,
            "created_at"         => $this->created_at,
            "updated_at"         => $this->updated_at,
            "hasUploadedService" => $this->hasUploadedService,
            "requestMade"        => $this->requestMade,
            "latitude"           => $this->latitude,
            "longitude"          => $this->longitude,
            "is_agent"           => $this->is_agent,
            "agent_code"         => $this->agent_code,
            "identification_type"=> $this->identification_type,
            "identification_id"  => $this->identification_id,
            "lga"                => $this->lga,
            "idOfAgent"          => $this->idOfAgent,
            "last_seen"          => $this->last_seen,
            "is_paid"            => $this->is_paid,
            "total_paid"         => $this->total_paid,
            "group_code"         => $this->group_code,
            "level1"             => $this->level1,
            "level2"             => $this->level2,
            "level3"             => $this->level3,
            "level4"             => $this->level4,
            "agent_id"           => $this->agent_id
        ];
    }
}
