<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeekingWorkResource extends JsonResource
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
            'fullname'               => $this->fullname,
            'job_title'              => $this->job_title,
            'phone'                  => $this->phone,
            'job_type'               => $this->job_type,
            'slug'                   => $this->slug,
            'job_experience'         => $this->job_experience,
            'still_studying'         => $this->still_studying,
            'gender'                 => $this->gender,
            'age'                    => $this->age,
            'marital_status'         => $this->marital_status,
            'employment_status'      => $this->employment_status,
            'highest_qualification'  => $this->highest_qualification,
            'expected_salary'        => $this->expected_salary,
            'user_state'             => $this->user_state,
            'user_lga'               => $this->user_lga,
            'thumbnail'              => route('home') . '/uploads/seekingworks/'.$this->thumbnail,
            'work_experience'        => $this->work_experience,
            'education'              => $this->education,
            'certifications'         => $this->certifications,
            'skills'                 => $this->skills,
            'status'                 => $this->status,
            'badge_type'             => $this->badge_type,
            'is_featured'            => $this->is_featured,
            'paid_featured'          => $this->paid_featured,
            'likes'                  => $this->likes,
            'images'                 => SeekingWorkImageResource::collection($this->images)
        ];
    }
}
