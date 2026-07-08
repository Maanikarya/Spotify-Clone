<?php

namespace App\Services;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArtistService
{
    public function getArtists(Request $req)
    {
        Log::channel('artist')->info('Getting artist details');

        $query = Artist::query()
            ->latest()
            ->when($req->filled('search'), function ($query) use ($req) {
                $query->where('name', 'like', "%{$req->search}%");
            });

        Log::channel('artist')->debug('Raw SQL', [
            'query' => $query->toRawSql(),
        ]);

        return $query->paginate($req->integer('per_page', 10));
    }
}