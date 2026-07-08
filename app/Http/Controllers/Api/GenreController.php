<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::latest()->paginate(10);
        return GenreResource::collection($genres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        try{
            $genre = Genre::create($request->validated());
            return (new GenreResource($genre))
                    ->additional([
                        'success' => true,
                        'messgae' => 'Genre Created Successfully'
                    ]);
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'messgae' => 'Something Went Wrong'
            ]);
        }
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
