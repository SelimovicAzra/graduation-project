<?php

namespace App\Http\Controllers\WebPage;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('web-page.pages.donation.index')
            ->withDonation(Donation::all());
    }

    public function userDonation(User $user)
    {
        $userDonation = $user->donation;
        dd($userDonation);
        return view('web-page.pages.userDonation.index')
            ->withDonation();
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
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
//        dd($item);
//        $city = $item->city;
//        $category = $item->category;
//        dd($category);
////        dd($city);
//        return view('web-page.pages.donation.show')
//            ->withItem($item);
////            ->withCity($city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
