<?php

namespace App\Http\Controllers\WebPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\EditItemRequest;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web-page.pages.item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('web-page.pages.item.create')
            ->withCategory($category);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request, Item $item)
    {
//        dd($request->all());
        $attributes = $request->validated();
        $attributes['category_id'] = $request->category_id;
        $attributes['city_id'] = $request->city_id;
        $attributes['user_id'] = Auth::user()->id;
//        dd($attributes['user_id']);
        if(isset($attributes['image'])) {
            $item->addMedia($attributes['image'])->preservingOriginal()->toMediaCollection('item-images');
        }
        $item->fill($attributes)->save();

        if($item){
            $donation = Donation::create([
               'user_id' => Auth::user()->id,
               'item_id'=> $item->id,
            ]);
            return (new ItemResource($item))
                ->response()
                ->setStatusCode(200);
        }
        return response()->json('Error while creating new item',422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditItemRequest $request, Item $item)
    {
        $user = Auth::user();
        $existingCity = $user->city;
        $category = Category::all();
        $image = $item->getMedia('item-images')->first() ? $item->getMedia('item-images')->first()->getUrl() : '';

        return view('web-page.pages.item.edit')
            ->withCategory($category)
            ->withItem($item)
            ->withExistingCity($existingCity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $attributes = $request->validated();
        $attributes['city_id'] = $request->city_id;
        if(isset($attributes['image'])){
            updateImage($attributes['image'], $item, 'item-images');
        }
        $item->update($attributes);
//        event(new UserUpdatedEvent($user));
        if ($item) {
            return (new ItemResource($item))
                ->response()
                ->setStatusCode(200);
        }
        return response()->json('Error while creating new user', 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
