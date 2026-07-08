<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
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
            'tilte' => $this->title,
            'cover_image' => $this->cover_image,
            'artist_id' => $this->artist_id,
            'artist_name' => $this->artist->name,
            'artist_bio' => $this->artist->bio,
            'artist_image' => $this->artist->image,
        ];
    }
}
