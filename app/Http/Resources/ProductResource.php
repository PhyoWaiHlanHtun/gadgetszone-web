<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'category' => $this->category->name,
            'type' => $this->type->name,
            'brand' => $this->brand->name,
            'price' => $this->price,
            'description' => $this->description,
            'images' => $this->testing($this->images)
        ];
    }

    public function testing($images)
    {
        $array =  explode(',', $images);

        foreach ($array as $arr) {
            $data[] = url('/').'/storage/images/product/'.$arr;
        }

        return $data;
    }
}
