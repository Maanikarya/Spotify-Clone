<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Services\AlbumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request ,  AlbumService $album_service)
    {
        $albums = Album::with('artist')->latest()->paginate(10);
        return AlbumResource::collection($albums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request , AlbumService $album_service  )
    {
        $album = $album_service->storeAlbum($request);
        return (new AlbumResource($album))
            ->additional([
                'success' => true,
                'message' => 'Album created successfuly!',
            ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
