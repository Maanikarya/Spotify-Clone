<?php

namespace App\Services;

use App\Http\Requests\StoreAlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlbumService
{
    public function getArtists(Request $req)
    {
        // Log::channel('artist')->info('Getting artist details');

        // $query = Artist::query()
        //     ->latest()
        //     ->when($req->filled('search'), function ($query) use ($req) {
        //         $query->where('name', 'like', "%{$req->search}%");
        //     });

        // Log::channel('artist')->debug('Raw SQL', [
        //     'query' => $query->toRawSql(),
        // ]);

        // return $query->paginate($req->integer('per_page', 10));
    }

    public function storeAlbum(StoreAlbumRequest $request){
        Log::channel('albums')->debug("Intiating the Album Storing process" , $request->validated());
        return Album::create($request->validated());
    }
}