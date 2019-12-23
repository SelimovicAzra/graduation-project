<?php

namespace App\Http\Controllers\Cms;

use App\Events\City\CityCreatedEvent;
use App\Events\Country\CountryCreatedEvent;
use App\Events\Country\CountryDeletedEvent;
use App\Events\Country\CountryUpdatedEvent;
use App\Http\Requests\Company\EditCompanyRequest;
use App\Http\Requests\Country\DeleteCountryRequest;
use App\Http\Requests\Country\EditCountryRequest;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use PHPUnit\Framework\Constraint\Count;

class CountryCmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cms.pages.country.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $country = Country::where('name','like','%'.$search.'%')->get();
        return CountryResource::collection($country);
    }
    public function raw(Request $request)
    {
        $search = $request->search;
        $countries = Country::filter()->paginate(10);
        return CountryResource::collection($countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.pages.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $request
     * @param Country $country
     * @return Response
     */
    public function store(StoreCountryRequest $request, Country $country)
    {
//        dd($request->all());
        $attributes = $request->validated();
        $country = new Country();
        $country->fill($attributes)->save();
        event(new CountryCreatedEvent($country));
        if ($country) {
            return (new CountryResource($country))
                ->response()
                ->setStatusCode(200);
        }
        return response()->json('Error while creating new country', 422);
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function show(Country $country)
    {
        return view('cms.pages.country.show')
            ->withCountry($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditCountryRequest $request
     * @param Country $country
     * @return Response
     */
    public function edit(EditCountryRequest $request,Country $country)
    {
        return view('cms.pages.country.edit')
            ->withCountry($country);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryRequest $request
     * @param Country $country
     * @return void
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $attributes = $request->validated();
        $country->update($attributes);
        event(new CountryUpdatedEvent($country));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteCountryRequest $request
     * @param Country $country
     * @return Response
     * @throws \Exception
     */
    public function destroy(DeleteCountryRequest $request, Country $country)
    {
        $country->delete();
        event(new CountryDeletedEvent($country));
        return response()->json(['status' => 'Country successfully deleted'], 200);
    }
}
