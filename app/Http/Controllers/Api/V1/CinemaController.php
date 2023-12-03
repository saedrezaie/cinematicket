<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;
use App\Http\Resources\CinemaResource;
use App\Models\Cinema;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class CinemaController extends BaseApiController
{

    public function index(Request $request): JsonResponse
    {
        if (isset($request["ticket_max"])) {
            $cinemas = Cinema::query()->withCount("tickets")
                ->orderByDesc("tickets_count")
                ->limit(1)
                ->get();
        } else
            $cinemas = Cinema::withTrashed()->with(["city", "sections"])->get();
        return $this->successResponse(
            CinemaResource::collection($cinemas),
            trans("Cinema.index_message"),
            201
        );
    }


    public function store(StoreCinemaRequest $request, Cinema $cinema): JsonResponse
    {
        $cinemas = $cinema->create($request->validated());
        return $this->successResponse(
            CinemaResource::make($cinemas),
            trans("Cinema.success_store"),
            201
        );
    }


    public function show(Cinema $cinema): JsonResponse
    {
        return $this->successResponse(
            CinemaResource::make($cinema->load(["city", "sections"])),
            trans("Cinema.index_message"),
            201
        );
    }


    public function update(UpdateCinemaRequest $request, Cinema $cinema): JsonResponse
    {
        $cinema->update($request->validated());
        return $this->successResponse(
            CinemaResource::make($cinema),
            trans("Cinema.success_update"),
            201
        );
    }

    public function destroy(Cinema $cinema): JsonResponse
    {
        $cinema->delete();
        return $this->successResponse(
            "true",
            trans("Cinema.success_delete"),
            201
        );
    }

    public function forceDelete($id)
    {
        $cinema = Cinema::withTrashed()->findOrFail($id);
        if ($cinema->forceDelete()) {
            return "deleted successfully";
        } else {
            return "warning!";
        }
    }

    public function restore($id): string
    {
        $cinema = Cinema::onlyTrashed()->findOrFail($id);
        $cinema->restore();
        if ($cinema->restore()){
            return "restore element successfully";
        }else{
            return "warning!";
        }
    }
}
