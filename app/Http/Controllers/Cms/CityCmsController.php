<?php

namespace App\Http\Controllers\Cms;

use App\Events\City\CityCreatedEvent;
use App\Events\City\CityDeletedEvent;
use App\Events\City\CityUpdatedEvent;
use App\Http\Requests\City\EditCityRequest;
use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Country;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CityCmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cms.pages.city.index');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $citiesCm = City::where('name','like','%'.$search.'%')->get();
        return CityResource::collection($citiesCm);
    }
    public function raw(Request $request)
    {
        $search = $request->search;
        $cities = City::filter()->paginate(10);
        return CityResource::collection($cities);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.pages.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCityRequest $request
     * @param City $citiesCm
     * @return JsonResponse
     */
    public function store(StoreCityRequest $request, City $citiesCm)
    {
//        dd($request->all());
        $attributes = $request->validated();
        if($request['slug']==null){
            $attributes['slug'] = generateSlug($request['name']);
        }
        $attributes['country_id'] = $request->country_id;
        $citiesCm->fill($attributes)->save();
//        event(new CityCreatedEvent($citiesCm));
        if($citiesCm){
            return (new CityResource($citiesCm))
                ->response()
                ->setStatusCode(200);
        }
        return response()->json('Error while creating new citiesCm',422);

    }

    /**
     * Display the specified resource.
     *
     * @param City $citiesCm
     * @return Response
     */
    public function show(City $citiesCm)
    {
        $country = $citiesCm->country;
//        dd($country);
        return view('cms.pages.city.show')
            ->withCitiesCm($citiesCm)
            ->withCountry($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditCityRequest $request
     * @param City $citiesCm
     * @return Response
     */
    public function edit(EditCityRequest $request, City $citiesCm)
    {
        $existingCountry = $citiesCm->country;
//        dd($citiesCm);
        return  view('cms.pages.city.edit')
            ->withCitiesCm($citiesCm)
            ->withExistingCountry($existingCountry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCityRequest $request
     * @param City $citiesCm
     * @return void
     */
    public function update(UpdateCityRequest $request, City $citiesCm)
    {
        $attributes = $request->validated();
        $citiesCm->update($attributes);
//        event(new CityUpdatedEvent($citiesCm));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $citiesCm
     * @return Response
     * @throws Exception
     */
    public function destroy(City $citiesCm)
    {
        $citiesCm->delete();
//        event(new CityDeletedEvent($citiesCm));
        return response()->json(['status' => 'CityCms successfully deleted'],200);
    }
}
