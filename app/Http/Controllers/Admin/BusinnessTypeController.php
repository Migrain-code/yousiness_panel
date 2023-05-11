<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinnessType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinnessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $types=BusinnessType::all();
        return view('admin.business_type.index', compact('types'));
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
        $businnessType=new BusinnessType();
        $businnessType->name=$request->input('name');

        if ($businnessType->save()){
            return to_route('admin.businnessType.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"İşletme Türü Eklendi"
            ]);
        }
        return to_route('admin.businnessType.index')->with('response', [
            'status'=>"danger",
            'title'=>"Hata",
            'message'=>"Bir hata sebebi ile İşletme Türü Eklenemedi"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param BusinnessType $businnessType
     * @return Response
     */
    public function show(BusinnessType $businnessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BusinnessType $businnessType
     * @return Response
     */
    public function edit(BusinnessType $businnessType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BusinnessType $businnessType
     * @return Response
     */
    public function update(Request $request, BusinnessType $businnessType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BusinnessType $businnessType
     * @return Response
     */
    public function destroy(BusinnessType $businnessType)
    {

        if ($businnessType->delete()){
            return response()->json([
               'status'=>"success",
            ]);
        }
    }
}
