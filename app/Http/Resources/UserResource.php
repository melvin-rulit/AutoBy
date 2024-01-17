<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'email' => $this->resource->email,
            'first_name' => $this->resource->first_name,
            'middle_name' => $this->resource->middle_name,
            'last_name' => $this->resource->last_name,
            'birthday' => $this->resource->birthday,
            'passport_series' => $this->resource->passport_series,
            'passport_number' => $this->resource->passport_number,
            'passport_notes' => $this->resource->passport_notes,
            'registration_address' => $this->resource->registration_address,
            'phone_number' => $this->resource->phone_number,
            'comment' => $this->resource->comment,
            'role_id' => $this->resource->role_id,
            'branch_id' => $this->resource->branch_id,
            'enabled' => $this->resource->enabled,
        ];
    }
}
