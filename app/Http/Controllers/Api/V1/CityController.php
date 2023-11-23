<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends BaseApiController
{

    public function index(Request $request): JsonResponse
    {
        $users = DB::table('cities')
            ->join('cinemas', 'section.id', '=', 'cinemas.section_id')
            ->join('sections', 'ticket.id', '=', 'sections.ticket_id')
            ->select('cinemas.*', 'cities.name', 'orders.price')
            ->get();
        $cities = City::with(["cinemas", "tickets"])->get();
        return $this->successResponse(
            CityResource::collection($cities),
            trans("City.index_message"),
            201
        );
    }


    public function store(StoreCityRequest $request, City $city): JsonResponse
    {
        $cities = $city->create($request->validated());
        return $this->successResponse(
            CityResource::make($cities),
            trans("City.success_store"),
            201
        );
    }


    public function show(City $city): JsonResponse
    {
        return $this->successResponse(
            CityResource::make($city->load("cinemas")),
            trans("City.index_message"),
            201
        );
    }


    public function update(UpdateCityRequest $request, City $city): JsonResponse
    {
        $city->update($request->validated());
        return $this->successResponse(
            CityResource::make($city),
            trans("City.success_update"),
            201
        );
    }


    public function destroy(City $city): JsonResponse
    {
        $city->delete();
        return $this->successResponse(
            $city->id,
            trans("City.success_delete"),
            201
        );
    }
}
