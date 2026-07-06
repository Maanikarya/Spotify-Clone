<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $artists = Artist::latest()->paginate(10);
        return ArtistResource::collection($artists)
                ->additional([
                    'success' => true,
                    'message' => 'Artist Data reterived successfuly!',
                ]);
    }

    /**
     * Show the Artist data.
     */
    public function show(Artist $artist){
        return (new ArtistResource($artist))
                ->additional([
                    'success' => true,
                    'message' => 'Artist Data reterived successfuly!',
                ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistRequest $request)
    {
         $artist = Artist::create($request->validated());

        return (new ArtistResource($artist))
                ->additional([
                    'success' => true,
                    'message' => 'Artist Created successfuly!',
                    'data' => null
                ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());

        return (new ArtistResource($artist))
                ->additional([
                    'success' => true,
                    'message' => 'Artist Updated successfuly!',
                ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Artist deleted successfully!',
        ]);
    }
}
