<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'asset_tag' => $this->asset_tag,
            'name' => $this->name,
            'serial_number' => $this->serial_number,
            'model_name' => $this->model_name,
            'purchase_date' => $this->purchase_date,
            'purchase_price' => $this->purchase_price,
            'status' => $this->status,
            'notes' => $this->notes,

            // Relations
            // 'category' => new CategoryResource($this->whenLoaded('category')),
            // 'location' => new LocationResource($this->whenLoaded('location')),
            // 'manufacturer' => new ManufacturerResource($this->whenLoaded('manufacturer')),
            // 'assigned_to' => new UserResource($this->whenLoaded('assignedTo')),
        ];
    }
}
