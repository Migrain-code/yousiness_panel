<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $businessCategories = BusinessCategory::all();
        return view('admin.business_category.index', compact('businessCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $businessCategory = new BusinessCategory();
        $businessCategory->name = $request->input('name');
        $businessCategory->icon = 'storage/' .  $request->file('image')->store('businessCategory');
        $businessCategory->mobile_image = 'storage/' .  $request->file('mobile_image')->store('businessCategoryMobile');
        $businessCategory->slug = Str::slug($request->input('name'));
        if ($businessCategory->save()){
            return to_route('admin.businessCategory.index')->with('response', [
                'status' => "success",
                'message' => "Kategori Eklendi",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param BusinessCategory $businessCategory
     * @return Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BusinessCategory $businessCategory
     * @return Response
     */
    public function edit(BusinessCategory $businessCategory)
    {
        return view('admin.business_category.edit', compact('businessCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BusinessCategory $businessCategory
     * @return Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        $businessCategory->name = $request->input('name');
        if ($request->hasFile('image')){
            $businessCategory->icon = 'storage/' .  $request->file('image')->store('businessCategory');
        }
        if ($request->hasFile('mobile_image')){
            $businessCategory->mobile_image = 'storage/' .  $request->file('mobile_image')->store('businessCategoryMobile');
        }
        $businessCategory->slug = Str::slug($request->input('name'));
        if ($businessCategory->save()){
            return to_route('admin.businessCategory.index')->with('response', [
                'status' => "success",
                'message' => "Kategori Eklendi",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BusinessCategory $businessCategory
     * @return Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {
        //
    }
}
