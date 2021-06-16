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
            "image"              => $this->image ? route('home') . '/uploads/users/' . $this->image : route('home') . '/uploads/users/nouserimage.png',
            "phone"              => $this->phone == null ? '' : $this->phone,
            "about"              => $this->about == null ? '' : $this->about,
            "address"            => $this->address == null ? '' : $this->address,
            "state"              => $this->state == null ? '' : $this->state,
            "slug"               => $this->slug == null ? '' : $this->slug,
            "refererLink"        => $this->refererLink == null ? '' : $this->refererLink,
            "idOfReferer"        => $this->idOfReferer == null ? 0 : $this->idOfReferer,
            "refererAmount"      => $this->refererAmount == null ? 0 : $this->refererAmount,
            "status"             => $this->status,
            "badges"             => $this->badges,
            "bank_name"          => $this->bank_name == null ? '' : $this->bank_name,
            "account_number"     => $this->account_number == null ? '' : $this->account_number,
            "account_name"       => $this->account_name == null ? '' : $this->account_name,
            "badgetype"          => $this->badgetype,
            "hasUploadedService" => $this->hasUploadedService,
            "requestMade"        => $this->requestMade,
            "latitude"           => $this->latitude == null ? '' : $this->latitude,
            "longitude"          => $this->longitude == null ? '' : $this->longitude,
            "is_agent"           => $this->is_agent,
            "agent_code"         => $this->agent_code == null ? '' : $this->agent_code,
            "identification_type"=> $this->identification_type == null ? '' : $this->identification_type,
            "identification_id"  => $this->identification_id == null ? '' : $this->identification_id,
            "lga"                => $this->lga == null ? '' : $this->lga,
            "idOfAgent"          => $this->idOfAgent == null ? 0 : $this->idOfAgent,
            "last_seen"          => $this->last_seen == null ? '' : $this->last_seen,
            "is_paid"            => $this->is_paid == null ? '' : $this->is_paid,
            "total_paid"         => $this->total_paid == null ? '' : $this->total_paid,
            "group_code"         => $this->group_code == null ? '' : $this->group_code,
            "level1"             => $this->level1 == null ? '' : $this->level1,
            "level2"             => $this->level2 == null ? '' : $this->level2,
            "level3"             => $this->level3 == null ? '' : $this->level3,
            "level4"             => $this->level4 == null ? '' : $this->level4,
            "email_verified_at"  => $this->email_verified_at == null ? '' : $this->email_verified_at,
            "subscription_has_ended"      => $this->sub_has_ended == null ? 0 : $this->sub_has_ended,
            "created_at"         => $this->created_at,
            "updated_at"         => $this->updated_at,
        ];
    }
}
