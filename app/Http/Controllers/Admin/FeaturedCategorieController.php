<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\City;
use App\Models\FeaturedCategorie;
use App\Models\FeaturedCategoryCity;
use Illuminate\Http\Request;

class FeaturedCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredCategories = FeaturedCategorie::all();
        $categories = BusinessCategory::select('id', 'name', 'slug', 'meta_keys', 'meta_description')->get();
        $cities = City::select('id', 'name', 'slug')->get();

        return view('admin.featured_category.index', compact('featuredCategories', 'categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $featuredCategorie = new FeaturedCategorie();
        $featuredCategorie->category_id = $request->category_id;
        $featuredCategorie->meta_title = $request->meta_title;
        $featuredCategorie->meta_description = $request->meta_description;
        $featuredCategorie->status = 1;

        if ($featuredCategorie->save()) {
            foreach ($request->city_ids as $city_id) {
                $featuredCategorieCity = new FeaturedCategoryCity();
                $featuredCategorieCity->featured_id = $featuredCategorie->id;
                $featuredCategorieCity->city_id = $city_id;
                $featuredCategorieCity->save();
            }
            return to_route('admin.featuredCategorie.index')->with('response', [
                'status' => "success",
                'message' => 'Öne Çıkan Kategori Eklendi'
            ]);
        }
        return to_route('admin.featuredCategorie.index')->with('response', [
            'status' => "error",
            'message' => 'Sistemsel Bir Hata Oluştu'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FeaturedCategorie $featuredCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedCategorie $featuredCategorie)
    {
        $categories = BusinessCategory::select('id', 'name', 'slug', 'meta_keys', 'meta_description')->get();
        $cityIds=[];
        foreach ($featuredCategorie->cities as $city){
            $cityIds[]= $city->id;
        }

        return view('admin.featured_category.edit', compact('categories', 'cityIds', 'featuredCategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FeaturedCategorie $featuredCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedCategorie $featuredCategorie)
    {
        $featuredCategorie->category_id = $request->category_id;
        $featuredCategorie->status = boolval($request->status);
        $featuredCategorie->meta_title = $request->meta_title;
        $featuredCategorie->meta_description = $request->meta_description;

        if ($featuredCategorie->save()) {
            FeaturedCategoryCity::where('featured_id', $featuredCategorie->id)->delete();
            foreach ($request->city_ids as $city_id) {
                $featuredCategorieCity = new FeaturedCategoryCity();
                $featuredCategorieCity->featured_id = $featuredCategorie->id;
                $featuredCategorieCity->city_id = $city_id;
                $featuredCategorieCity->save();
            }
            return to_route('admin.featuredCategorie.index')->with('response', [
                'status' => "success",
                'message' => 'Öne Çıkan Kategori Güncellendi'
            ]);
        }
        return to_route('admin.featuredCategorie.index')->with('response', [
            'status' => "error",
            'message' => 'Sistemsel Bir Hata Oluştu'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FeaturedCategorie $featuredCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedCategorie $featuredCategorie)
    {
        if ($featuredCategorie->delete()) {
            return response()->json([
                'status' => "success",
                'message' => "Kategori Silindi"
            ]);
        }
    }


}
