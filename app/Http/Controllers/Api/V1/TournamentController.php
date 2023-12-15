<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTournamentRequest;
use App\Http\Resources\TournamentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Tournament;

class TournamentController extends Controller
{
    public function index()
    {
        return TournamentResource::collection(Tournament::all());
    }

    public function store(StoreTournamentRequest $request)
    {
        $tournament = Tournament::create($request->validated());

        return TournamentResource::make($tournament);
    }

    public function show(Tournament $tournament)
    {
        return TournamentResource::make($tournament);
    }

    public function update(StoreTournamentRequest $request, Tournament $tournament)
    {
        $tournament->update($request->validated());

        return response()->json(TournamentResource::make($tournament), Response::HTTP_ACCEPTED);
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return response()->noContent();
    }
}
