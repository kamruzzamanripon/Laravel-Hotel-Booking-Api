<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
        
        //  return [
        //     'id' => $this->id,
        //     'room_name' => $this->room_name,
        //     'pricePerNight' => $this->pricePerNight,
        //     'description' => $this->description,
        //     'guestCapacity' => $this->guestCapacity,
        //     'numOfBeds' => $this->numOfBeds,
        //     'internet' => $this->internet,
        //     'breakfast' => $this->breakfast,
        //     'airConditioned' => $this->airConditioned,
        //     'petsAllowed' => $this->petsAllowed,
        //     'roomCleaning' => $this->roomCleaning,
        //     'image' => $this->image,
        //     'category_id' => $this->category_id,
        //     'category' => $this->category,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
           
        // ];
    }
}
