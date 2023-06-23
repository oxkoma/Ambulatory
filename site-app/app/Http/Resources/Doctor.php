<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doctor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fname' => $this->fname,
            'lname' => $this->lname,
			'mname' => $this->mname,
            'speciality_id' => $this->speciality_id,
            'description' => $this->description,
            'img' => $this->img,
			'keywords' => $this->keywords,
			'experience' => $this->experience,
			'category' => $this->category,
        ];
    }
}
