<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
        //     'id' => $this->id,
        //     'username' => $this->username,
        //     'email' => $this->email,
        //     'phone' => $this->phone,
        //     'status' => $this->status,
        //     'agent' => $this->agent,
        //     'referral_code' => $this->referral->code,
        //     'level' => $this->referral->level->name,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];
    }
}
