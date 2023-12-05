<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\BusinessService;
use App\Models\BusinnessType;
use App\Models\DayList;
use App\Models\PersonelService;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class BusinessServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $dayList = DayList::all();

        return view('business.service.index', compact('dayList'));
    }

    public function category(Request $request)
    {
        $sub_category = ServiceSubCategory::where('category_id', $request->category)->get();
        return $sub_category;
    }

    public function gender(Request $request)
    {
        if ($request->gender == "all") {
            $category = ServiceCategory::with('type')->where('type_id', 1)->get();
        } else {
            $category = ServiceCategory::where('type_id', $request->gender)->get();
        }
        //dd($category);
        return $category;
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

        $request->validate([
            'category' => "required",
            'sub_category' => "required",
            'time' => "required",
            'price' => "required",
        ], [], [
            'category' => "Servicekategorie",
            'sub_category' => "Servicetyp",
            'time' => "Servicedauer",
            'price' => "Servicepreis",
        ]);
        if ($request->gender == "all"){
            $serviceSubCategory = ServiceSubCategory::find($request->input('sub_category'));
            $businessService = new BusinessService();
            $businessService->business_id = auth('business')->id();
            $businessService->type = $serviceSubCategory->category->type_id;
            $businessService->category = $serviceSubCategory->category_id;
            $businessService->sub_category = $serviceSubCategory->id;
            $businessService->time = $request->input('time');
            $businessService->price = $this->sayiDuzenle($request->input('price'));
            $businessService->save();

            $serviceSubCategorys2 = ServiceSubCategory::where('slug', $serviceSubCategory->slug."-m")->first();
            $businessService = new BusinessService();
            $businessService->business_id = auth('business')->id();
            $businessService->type = $serviceSubCategorys2->category->type_id;
            $businessService->category = $serviceSubCategorys2->category_id;
            $businessService->sub_category = $serviceSubCategorys2->id;
            $businessService->time = $request->input('time');
            $businessService->price = $this->sayiDuzenle($request->input('price'));
            $businessService->save();

            return to_route('business.businessService.index')->with('response', [
                'status' => "success",
                'title' => "",
                'message' => "Dienstleistung/en erfolgreich hinzugefügt."
            ]);

        }
        else{
            $businessService = new BusinessService();
            $businessService->business_id = auth('business')->id();
            $businessService->type = $request->input('gender');
            $businessService->category = $request->input('category');
            $businessService->sub_category = $request->input('sub_category');
            $businessService->time = $request->input('time');
            $businessService->price = $this->sayiDuzenle($request->input('price'));
            if ($businessService->save()) {
                return to_route('business.businessService.index')->with('response', [
                    'status' => "success",
                    'title' => "Erfolgreich",
                    'message' => "Dienst hinzugefügt. Sie können es in der Liste unten sehen"
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param BusinessService $businessService
     * @return Response
     */
    public function show(BusinessService $businessService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BusinessService $businessService
     * @return Response
     */
    public function edit(BusinessService $businessService)
    {
        return view('business.service.edit', compact('businessService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BusinessService $businessService
     * @return Response
     */
    public function update(Request $request, BusinessService $businessService)
    {
        $businessService->business_id = auth('business')->id();
        $businessService->type = $request->input('gender');
        $businessService->category = $request->input('category');
        $businessService->sub_category = $request->input('sub_category');
        $businessService->time = $request->input('time');
        $businessService->price = $this->sayiDuzenle($request->input('price'));
        if ($businessService->save()) {
            return to_route('business.businessService.index')->with('response', [
                'status' => "success",
                'title' => "Erfolgreich",
                'message' => "Dienst aktualisiert. Sie können es in der Liste unten sehen"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BusinessService $businessService
     * @return Response
     */
    public function destroy(BusinessService $businessService)
    {
        PersonelService::where('service_id', $businessService->id)->delete();
        if ($businessService->delete()){
            return response()->json([
                'status' => "success",
                'message' => "Dienst gelöscht",
            ]);
        }
    }

    function sayiDuzenle($sayi){
        $sayi = str_replace('.','',$sayi);
        $sayi = str_replace(',','.',$sayi);
        $sonuc = floatval($sayi);
        return $sonuc;
    }
}
