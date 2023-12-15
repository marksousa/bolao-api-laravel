<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSportRequest;
use App\Http\Resources\SportResource;
use App\Models\Sport;
use Illuminate\Http\Response;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SportResource::collection(Sport::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRequest $request)
    {
        $sport = Sport::create($request->validated());

        return SportResource::make($sport);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        return SportResource::make($sport);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSportRequest $request, Sport $sport)
    {
        $sport->update($request->validated());

        return response()->json(SportResource::make($sport), Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();

        return response()->noContent();
    }
}
