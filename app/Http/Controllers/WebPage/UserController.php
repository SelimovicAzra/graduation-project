<?php

namespace App\Http\Controllers\WebPage;

use App\Events\User\UserUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web-page.pages.user.edit');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param EditUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(EditUserRequest $request, User $user)
    {
//        dd($request->all());
        $city = $user->city;
        $image = $user->getMedia('user-avatars')->first() ? $user->getMedia('user-avatars')->first()->getUrl() : '';
        return view('web-page.pages.user.edit')
            ->withUser($user)
            ->withCity($city)
            ->withImage($image);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
//        dd($request->all());
        $attributes = $request->validated();
        $attributes['city_id'] = $request->city_id;
        if(isset($attributes['image'])){
            updateImage($attributes['image'], $user, 'user-avatars');
        }
        $user->update($attributes);
        if ($user) {
            return (new UserResource($user))
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
