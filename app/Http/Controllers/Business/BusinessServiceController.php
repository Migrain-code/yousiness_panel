<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\BusinessService;
use App\Models\BusinnessType;
use App\Models\DayList;
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
        $dayList=DayList::all();

        return view('business.service.index', compact('dayList'));
    }
    public function category(Request  $request)
    {
        $sub_category = ServiceSubCategory::where('category_id',$request->category)->get();
        return $sub_category;
    }
    public function gender(Request  $request)
    {
        if ($request->gender == "all"){
            $category = ServiceCategory::latest("type_id")->get();
        }
        else{
            $category = ServiceCategory::where('type_id',$request->gender)->get();
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
        //$request->dd();
        $businessService= new BusinessService();
        $businessService->business_id=auth('business')->id();
        $businessService->type=$request->input('gender');
        $businessService->category=$request->input('category');
        $businessService->sub_category=$request->input('sub_category');
        $businessService->time=$request->input('time');
        $businessService->price=$request->input('price');
        if ($businessService->save()){
            return to_route('business.businessService.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Hizmet Eklendi. Aşağıdaki Listede Görebilirsiniz"
            ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BusinessService $businessService
     * @return Response
     */
    public function update(Request $request,BusinessService $businessService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BusinessService $businessService
     * @return Response
     */
    public function destroy(BusinessService $businessService)
    {
        //
    }
}
