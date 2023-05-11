<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinnessType;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $types=BusinnessType::all();
        $categories=ServiceCategory::all();
        return view('admin.service_category.index', compact('categories', 'types'));
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
        $serviceCategory=new ServiceCategory();
        $serviceCategory->name=$request->input('name');
        $serviceCategory->type_id=$request->input('type_id');
        if ($serviceCategory->save()){
            return to_route('admin.serviceCategory.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Himzet Kategorisi Eklendi"
            ]);
        }
        return to_route('admin.serviceCategory.index')->with('response', [
            'status'=>"danger",
            'title'=>"Hata",
            'message'=>"Bir hata sebebi ile Himzet Kategorisi Eklenemedi"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ServiceCategory $serviceCategory
     * @return Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ServiceCategory $serviceCategory
     * @return Response
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        $types=BusinnessType::all();
        return view('admin.service_category.edit', compact('serviceCategory', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServiceCategory $serviceCategory
     * @return Response
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->name=$request->input('name');
        $serviceCategory->type_id=$request->input('type_id');

        if ($serviceCategory->save()){
            return to_route('admin.serviceCategory.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Himzet Kategorisi Güncellendi"
            ]);
        }
        return to_route('admin.serviceCategory.index')->with('response', [
            'status'=>"danger",
            'title'=>"Hata",
            'message'=>"Bir hata sebebi ile Himzet Kategorisi Güncellenemedi"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServiceCategory $serviceCategory
     * @return Response
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        if ($serviceCategory->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
