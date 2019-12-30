<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemCmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.pages.item.index');
    }

    public function raw(Request $request)
    {
        $search = $request->search;
        $items = Item::filter()->paginate(10);
        return ItemResource::collection($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $itemsCm)
    {
        $image = " ";
        $userImage = " ";
        $user = $itemsCm->user;
        if (!$userImage) {
            $userImage = $itemsCm->user->getMedia('user-avatars')->first() ? $itemsCm->user->getMedia('user-avatars')->first()->getUrl() : '';
        }
        if (!$image) {
            $image = $itemsCm->getMedia('item-images')->first() ? $itemsCm->getMedia('item-images')->first()->getUrl() : '';
        }
        $city = $itemsCm->city;
        $category = $itemsCm->category;
        return view('cms.pages.item.show')
            ->withItemsCm($itemsCm)
            ->withCity($city)
            ->withCategory($category)
            ->withImage($image)
            ->withUser($user)
            ->withuserImage($userImage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $itemsCm)
    {
        $itemsCm->delete();
//        event(new UserDeletedEvent($usersCm));
        return response()->json(['status' => 'ItemCMS successfully deleted'],200);
    }
}
