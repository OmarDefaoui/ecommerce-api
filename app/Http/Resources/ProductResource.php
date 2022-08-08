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
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'images' => $this->productImages,
            'price' => $this->price,
            'colors' => $this->colors,
            'review' => $this->review,
            'discount' => $this->discount,
            'product_category_id' => $this->product_category_id,
            // 'product_category' => new ProductCategoryResource($this->productCategory), // call the relationship function
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
