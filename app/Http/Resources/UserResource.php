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
        //return parent::toArray($request);
        
        $request->roles = $this->roles;
        $request->permissions = $this->permissions;
        $request->client = $this->client;
        return parent::toArray($request);
    }
}
