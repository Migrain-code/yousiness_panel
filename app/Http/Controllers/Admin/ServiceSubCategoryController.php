<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories= ServiceCategory::all();
        $subCategories=ServiceSubCategory::orderBy('featured', 'DESC')->get();

        return view('admin.service_sub_category.index', compact('subCategories', 'categories'));
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
        $serviceSubCategory=new ServiceSubCategory();
        $serviceSubCategory->category_id=$request->category_id;
        $serviceSubCategory->name=$request->name;
        if ($serviceSubCategory->save()){
            return to_route('admin.serviceSubCategory.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Himzet Alt Kategorisi Eklendi"
            ]);
        }
        return to_route('admin.serviceSubCategory.index')->with('response', [
            'status'=>"danger",
            'title'=>"Hata",
            'message'=>"Bir hata sebebi ile Himzet Alt Kategorisi Eklenemedi"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ServiceSubCategory $serviceSubCategory
     * @return Response
     */
    public function show(ServiceSubCategory $serviceSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ServiceSubCategory $serviceSubCategory
     * @return Response
     */
    public function edit(ServiceSubCategory $serviceSubCategory)
    {
        $categories=ServiceCategory::all();
        return view('admin.service_sub_category.edit', compact('serviceSubCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServiceSubCategory $serviceSubCategory
     * @return Response
     */
    public function update(Request $request, ServiceSubCategory $serviceSubCategory)
    {
        $serviceSubCategory->category_id=$request->category_id;
        $serviceSubCategory->name=$request->name;
        $serviceSubCategory->featured=$request->number;
        if ($request->hasFile('icon')){
            $serviceSubCategory->icon='storage/'. $request->file('icon')->store('sub_category_icons');
        }
        if ($serviceSubCategory->save()){
            return to_route('admin.serviceSubCategory.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Himzet Alt Kategorisi Güncellendi"
            ]);
        }
        return to_route('admin.serviceSubCategory.index')->with('response', [
            'status'=>"danger",
            'title'=>"Hata",
            'message'=>"Bir hata sebebi ile Himzet Alt Kategorisi Güncellenemedi"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServiceSubCategory $serviceSubCategory
     * @return Response
     */
    public function destroy(ServiceSubCategory $serviceSubCategory)
    {
        if ($serviceSubCategory->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
