<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use http\QueryString;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        if (isset($request["ticket_max"])) {
            $movies = Movie::query()->withCount("tickets")
                ->orderByDesc("tickets_count")
                ->limit(1)
                ->get();
        } else if (isset($request["ticket_min"])) {
            $movies = Movie::query()->withCount("tickets")
                ->orderBy("tickets_count")
                ->limit(1)
                ->get();
        } else
            $movies = Movie::withTrashed()->with(["category", "sections"])->get();
        return $this->successResponse(
            MovieResource::collection($movies)
        );
    }

    public function store(StoreMovieRequest $request, Movie $movie): JsonResponse
    {
        $create = $movie->create($request->validated());
        return $this->successResponse(
            MovieResource::make($create),
            trans("Movie.success_store"),
            201
        );
    }


    public function show(Request $request, Movie $movie)
    {
        if (isset($request["ticket_count"])) {
            $movie->loadCount("tickets");
        }
        return MovieResource::make($movie->load(["category", "sections"]));
    }


    public function update(UpdateMovieRequest $request, Movie $movie): JsonResponse
    {
        $movie->update($request->validated());
        return $this->successResponse(
            MovieResource::make($movie),
            trans("Movie.success_update"),
            201
        );
    }

    public function destroy(Movie $movie): JsonResponse
    {
        $movie->delete();
        return $this->successResponse(
            $movie->id,
            trans("Movie.success_delete"),
            201
        );
    }

    public function forceDelete($id)
    {
        $movie = Movie::withTrashed()->findOrFail($id);
        if ($movie->forceDelete()) {
            return "deleted successfully";
        } else {
            return "warning!";
        }
    }

    public function restore($id): string
    {
        $movie = Movie::onlyTrashed()->findOrFail($id);
        $movie->restore();
        if ($movie->restore()) {
            return "restore element successfully";
        } else {
            return "warning!";
        }
    }
}
