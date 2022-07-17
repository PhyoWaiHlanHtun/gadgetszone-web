<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WithdrawalResource extends JsonResource
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

        foreach ($this->withdrawals as $withdrawal) {
            $data[] = [
                'id' => $withdrawal->id,
                'bank' => $withdrawal->bank->name,
                'account' => $withdrawal->account,
                'amount' => $withdrawal->amount,
                'date' => dateFormat($withdrawal->created_at),
                'status' => ($withdrawal->status == 0) ? 'Pending' :(($withdrawal->status == 1) ? 'Approved' : 'Rejected')
            ];
        }

        return $data;
    }
}
