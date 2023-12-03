<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends BaseApiController
{

    public function index()
    {
        $categories = Category::withTrashed()->with(['parent', 'children'])->get();
        return $this->successResponse(
            CategoryResource::collection($categories),
            trans('Category.index_message'),
            201
        );
    }


    public function store(StoreCategoryRequest $request, Category $category): JsonResponse
    {
        $categories = Category::create($request->validated());
        return $this->successResponse(
            $categories,
            trans('Category.success_store'),
            201
        );
    }


    public function show(Category $category): JsonResponse
    {
        return $this->successResponse(
          CategoryResource::make($category->load(["parent" , "children"])),
          trans("Category.index_message"),
          201
        );
    }


    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());
        return $this->successResponse(
            CategoryResource::make($category),
            trans("Category.success_update"),
        );
    }


    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return $this->successResponse(
          "true",
          trans("Category.success_delete"),
          201
        );
    }
    public function forceDelete($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->forceDelete()) {
            return "deleted successfully";
        } else {
            return "warning!";
        }
    }
    public function restore($id): string
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        if ($category->restore()) {
            return "restore element successfully";
        } else {
            return "warning!";
        }
    }
}
