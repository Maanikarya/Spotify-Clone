<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'album_id' => 'required|exists:albums,id',
            'genre_id' => 'required|exists:genres,id',
            'title' => 'required|string|min:3',
            'duration' => 'nullable|numeric',
            'audio_path' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ];
    }
}
