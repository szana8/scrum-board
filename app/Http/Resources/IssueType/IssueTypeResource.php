<?php

namespace App\Http\Resources\IssueType;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IssueTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'type' => $this->description,
            'icon' => $this->icon,
            'color_code' => $this->color_code,
        ];
    }
}
