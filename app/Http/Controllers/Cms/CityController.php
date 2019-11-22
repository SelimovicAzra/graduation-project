<?php

namespace App\Http\Controllers\Cms;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CityController extends Controller
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
//    public function search(Request $request)
//    {
//        $search = $request->search;
//        $city = City::where('name','like','%'.$search.'%')->get();
//        return CityResource::collection($city);
//    }
//    public function raw(Request $request)
//    {
//        $search = $request->search;
//        $cities = City::filter()->paginate(10);
//        return CityResource::collection($cities);
//    }
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return Response
//     */
//    public function create()
//    {
//        return view('cms.pages.city.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param StoreCityRequest $request
//     * @param City $city
//     * @return JsonResponse
//     */
//    public function store(StoreCityRequest $request, City $city)
//    {
//        $attributes = $request->validated();
//        if($request['slug']==null){
//            $attributes['slug'] = generateSlug($request['name']);
//        }
//        $attributes['country_id'] = $request->country_id;
//        $city->fill($attributes)->save();
//        event(new CityCreatedEvent($city));
//        if($city){
//            return (new CityResource($city))
//                ->response()
//                ->setStatusCode(200);
//        }
//        return response()->json('Error while creating new city',422);
//
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param City $city
//     * @return Response
//     */
//    public function show(City $city)
//    {
//        $country = $city->country;
//        return view('cms.pages.city.show')
//            ->withCity($city)
//            ->withCountry($country);
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param EditCityRequest $request
//     * @param City $city
//     * @return Response
//     */
//    public function edit(EditCityRequest $request, City $city)
//    {
//        $existingCountry = $city->country;
//        return  view('cms.pages.city.edit')
//            ->withCity($city)
//            ->withExistingCountry($existingCountry);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param UpdateCityRequest $request
//     * @param City $city
//     * @return void
//     */
//    public function update(UpdateCityRequest $request, City $city)
//    {
//        $attributes = $request->validated();
//        $city->update($attributes);
//        event(new CityUpdatedEvent($city));
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param City $city
//     * @return Response
//     * @throws Exception
//     */
//    public function destroy(City $city)
//    {
//        $city->delete();
//        event(new CityDeletedEvent($city));
//        return response()->json(['status' => 'City successfully deleted'],200);
//    }
}
