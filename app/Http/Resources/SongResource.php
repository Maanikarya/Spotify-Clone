<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
public function toArray(Request $request): array
{
    return [
        'id'          => $this->id,
        'title'       => $this->title,
        'duration'    => $this->duration,
        'audio_path'  => $this->audio_path,
        'cover_image' => $this->cover_image,

        'album_id'    => $this->album_id,
        'album_name'  => $this->album?->title,

        'genre_id'    => $this->genre_id,
        'genre_name'  => $this->genre?->name,
    ];
}
}
