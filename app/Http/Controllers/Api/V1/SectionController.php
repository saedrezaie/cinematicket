<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\JsonResponse;

class SectionController extends BaseApiController
{
    public function index(IndexRequest $request): JsonResponse
    {
        $section = Section::withTrashed()->with(["tickets", "cinema", 'movie'])->get();
        return $this->successResponse(
            SectionResource::collection($section),
            trans("Section.index_message"),
            201
        );
    }

    public function store(StoreSectionRequest $request, Section $section): JsonResponse
    {
        $create = $section->create($request->validated());
        return $this->successResponse(
            SectionResource::make($create),
            trans("Sans.success_store"),
            201
        );
    }

    public function show(Section $section): JsonResponse
    {
        return $this->successResponse(
            SectionResource::make($section->load(['tickets',"cinema", "movie"])),
            trans("Sans.index_message"),
            201
        );
    }

    public function update(UpdateSectionRequest $request, Section $section): JsonResponse
    {
        $section->update($request->validated());
        return $this->successResponse(
            SectionResource::make($section),
            trans("Sans.success_update"),
            201
        );
    }


    public function destroy(Section $section): JsonResponse
    {
        $section->delete();
        return $this->successResponse(
            $section->id,
            trans("Sans.success_delete"),
            201
        );
    }
    public function forceDelete($id)
    {
        $section = Section::withTrashed()->findOrFail($id);
        if ($section->forceDelete()) {
            return "deleted successfully";
        } else {
            return "warning!";
        }
    }
    public function restore($id): string
    {
        $section = Section::onlyTrashed()->findOrFail($id);
        $section->restore();
        if ($section->restore()) {
            return "restore element successfully";
        } else {
            return "warning!";
        }
    }
}
