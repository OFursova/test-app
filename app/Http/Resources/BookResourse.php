<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'release-date' => $this->release_date,
            'genre' => $this->genre,
            /*'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,*/
        ];
    }
}
