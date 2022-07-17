<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource
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

        foreach ($this->investments as $investment) {
            $data[] = [
                'id' => $investment->id,
                'bank' => $investment->bank->name,
                'plan' => $investment->plan,
                'amount' => $investment->amount,
                'date' => dateFormat($investment->created_at),
                'status' => ($investment->status == 0) ? 'Pending' :(($investment->status == 1) ? 'Approved' : 'Rejected')
            ];
        }

        return $data;
    }
}
