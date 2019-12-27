<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.pages.category.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categoriesCm = Category::where('name','like','%'.$search.'%')->get();
        return CategoryResource::collection($categoriesCm);
    }
    public function raw(Request $request){
        $search = $request->search;
        $categoriesCm = Category::filter()->paginate(10);
//        dd($categoriesCm);
        return CategoryResource::collection($categoriesCm);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $categoriesCm)
    {
        $attributes = $request->validated();
        if($request['slug'] == null){
            $attributes['slug'] = generateSlug($request['name']);
        }
        $categoriesCm = new Category();
        $categoriesCm->fill($attributes)->save();
//        event(new CategoryCreatedEvent($categoriesCm));
        if($categoriesCm){
            return(new CategoryResource($categoriesCm))
                ->response()
                ->setStatusCode(200);
        }
        return response()->json('Error while creating category', 422);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $categoriesCm
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoriesCm)
    {
        return view('cms.pages.category.show')
            ->withCategoriesCm($categoriesCm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditCategoryRequest $request, Category $categoriesCm)
    {
        return view('cms.pages.category.edit')
            ->withCategoriesCm($categoriesCm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $categoriesCm)
    {

        $attributes = $request->validated();
        $categoriesCm->update($attributes);
//        event(new CategoryUpdatedEvent($categoriesCm));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( DeleteCategoryRequest $request, Category $categoriesCm)
    {
        $categoriesCm -> delete();
//        event(new CategoryDeletedEvent($categoriesCm));

        return response()->json(['status'=>'Category section deleted successfully'],200);
    }
}
