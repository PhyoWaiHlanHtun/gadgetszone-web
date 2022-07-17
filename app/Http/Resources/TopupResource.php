<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [];

        foreach ($this->topups as $topup) {
            $data[] = [
                'id' => $topup->id,
                'bank' => $topup->bank->name,
                'amount' => $topup->amount,
                'date' => dateFormat($topup->created_at),
                'status' => ($topup->status == 0) ? 'Pending' :(($topup->status == 1) ? 'Approved' : 'Rejected')
            ];
        }

        return $data;
    }
}
