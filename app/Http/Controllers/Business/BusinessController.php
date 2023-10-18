<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessService;
use App\Models\BusinessWorkTime;
use App\Models\BusinnessType;
use App\Models\BussinessServicePartition;
use App\Models\DayList;
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
        return view('panel.business.index', compact('businesses'));
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
        return view('panel.business.create', compact('service_packages', 'types'));
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
            $counter=0;
            foreach ($request->start_time as $item) {
                $work_time=new BusinessWorkTime();
                $work_time->business_id=$business->id;
                $work_time->start_time=$item;
                $work_time->end_time=$request->end_time[$counter];
                $work_time->status=boolval($request->status[$counter]);
                $work_time->que=$counter;
                $work_time->save();
                $counter++;
            }
            return to_route('panel.business.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"İşletme Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }
    public function addService(Request $request){
        $service=new BusinessService();
        $service->name=$request->input('name');
        $service->business_id=$request->input('business_id');
        $service->status=1;
        if ($service->save()){
            $partititon=new BussinessServicePartition();
            $partititon->service_id=$service->id;
            $partititon->name=$request->input('name');
            $partititon->service_category=$request->input('service_category');
            $partititon->service_sub_category=$request->input('service_sub_category');
            $partititon->price=$request->input('price');
            $partititon->status=1;
            $partititon->save();
            return to_route('panel.business.edit', $request->input('business_id'))->with('response', [
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
    public function show()
    {
        $dayList=DayList::all();
        $business=auth('business')->user();
        //dd($business->workTimes);
        $businessTypes=BusinnessType::all();
        return view('business.show', compact('business', 'businessTypes', 'dayList'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Business $business
     * @return Response
     */
    public function edit(Business $business)
    {
        $categories= ServiceCategory::all();
        $service_packages=ServicePackage::all();
        return view('panel.business.edit', compact('service_packages', 'business', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Business $business
     * @return Response
     */
    public function update(Request $request)
    {
         $business= auth('business')->user();

         $business->name=$request->business_name;
         $business->type_id=$request->business_type;
         $business->appoinment_range=$request->minute;
         $business->approve_type=$request->approve_type;
         $business->year=$request->year;
         $business->phone=$request->b_phone;
         $business->business_email=$request->b_email;
         $business->city=$request->city;
         $business->address=$request->address;
         if ($request->hasFile('logo')){
             $business->logo='storage/'. $request->file('logo')->store('business_logo');
         }
        if ($request->hasFile('wallpaper')){
            $business->wallpaper='storage/'. $request->file('wallpaper')->store('business_wallpaper');
        }

         if ($business->save()){
             return to_route('business.profile.show')->with('response', [
                 'status'=>"success",
                 'title'=>"Başarılı",
                 'message'=>"Bilgileriniz Başarılı Bir Şekilde Güncellendi"
             ]);
         }
    }

    public function updateOwner(Request $request)
    {

        $business= auth('business')->user();
        $business->owner=$request->owner;
        $business->email=$request->email;
        $business->owner_email=$request->input('owner_email');
        $business->phone=$request->phone;
        $business->password=Hash::make($request->input('password'));
        if ($business->save()){
            return to_route('business.profile.show')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Bilgileriniz Başarılı Bir Şekilde Güncellendi"
            ]);
        }
    }
    public function updateWorkTime(Request $request)
    {

        $business= auth('business')->user();
        $business->off_day = $request->input('day');
        $business->start_time = $request->input('start_time');
        $business->end_time = $request->input('end_time');
        $business->save();
        return to_route('business.profile.show')->with('response', [
            'status'=>"success",
            'title'=>"Başarılı",
            'message'=>"Hier werden die Tage angezeigt, die nicht zu den Feiertagen Ihrer Mitarbeiter gehören. Sie müssen andere Feiertage als diese Tage für das Personal eingeben.niz Başarılı Bir Şekilde Güncellendi"
        ]);
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
