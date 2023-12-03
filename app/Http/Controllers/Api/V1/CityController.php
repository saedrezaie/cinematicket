<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends BaseApiController
{

    public function index(Request $request)
    {
        if (isset($request['ticket_max'])) {
            $cities = City::join('cinemas', 'cities.id', '=', 'cinemas.city_id')
                ->join('sections', 'cinemas.id', '=', 'sections.cinema_id')
                ->join('tickets', 'sections.id', '=', 'tickets.section_id')
                ->select('cities.name')
                ->selectRaw('COUNT(tickets.id) as count_ticket')
                ->groupBy('cities.id', 'cities.name')
                ->orderByDesc('count_ticket')
                ->limit(1)
                ->get();
        } else $cities = City::withTrashed()->get()->all();
        return $cities;
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

    public function forceDelete($id)
    {
        $city = City::withTrashed()->findOrFail($id);
        if ($city->forceDelete()) {
            return "deleted successfully";
        } else {
            return "warning!";
        }
    }

    public function restore($id)
    {
        $city = City::onlyTrashed()->findOrFail($id);
        $city->restore();
        if ($city->restore()){
            return "restore element successfully";
        }else{
            return "warning!";
        }
    }
}
