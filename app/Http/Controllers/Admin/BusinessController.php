<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessService;
use App\Models\BusinessWorkTime;
use App\Models\BusinnessType;
use App\Models\BussinessServicePartition;
use App\Models\ServiceCategory;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $businesses=Business::all();

        return view('admin.business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $types=BusinnessType::all();
        $service_packages=ServicePackage::where('status', 1)->get();
        return view('admin.business.create', compact('service_packages', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $business= new Business();
        $business->package_id=$request->input('package_id');
        $business->name=$request->input('name');
        $business->phone=$request->input('phone');
        $business->city=$request->input('city');
        $business->district=$request->input('district');
        $business->type_id=$request->input('type_id');
        $business->email=$request->input('email');
        $business->password=Hash::make($request->input('password'));
        /*$business->logo='storage/'. $request->file('logo')->store('businnes_logo');
        $business->wallpaper='storage/'. $request->file('logo')->store('businnes_wallpaper');*/
        if ($business->save()){
            return to_route('admin.business.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"İşletme Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }
    public function addService(Request $request){

        $service=new BusinessService();
        $service->business_id=$request->input('business_id');
        $service->type=$request->input('type');
        $service->status=1;
        $service->category=$request->input('service_category');
        $service->sub_category=$request->input('service_sub_category');
        $service->price=$request->input('price');
        $service->time=$request->input('time');
        if ($service->save()){
            return to_route('admin.business.edit', $request->input('business_id'))->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Hizmet Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param Business $business
     * @return Response
     */
    public function show(Business $business)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Business $business
     * @return Response
     */
    public function edit(Business $business)
    {
        $categories=$business->type->categories;
        if ($business->type->id == 3){
            $categories=ServiceCategory::all();
        }
        return view('admin.business.edit', compact('business', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Business $business
     * @return Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Business $business
     * @return Response
     */
    public function destroy(Business $business)
    {
        if ($business->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
