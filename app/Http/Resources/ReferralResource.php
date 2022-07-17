<?php

namespace App\Http\Resources;

use App\Models\Referral;
use Illuminate\Http\Resources\Json\JsonResource;

class ReferralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->referral_id) {
            $ref = Referral::find($this->referral_id);
            return [
                'id' => $ref->id,
                'code' => $ref->code,
                'user' => $ref->user->username,
                'level' => $ref->level->name,
            ];
        } else {
            return [];
        }
    }
}
