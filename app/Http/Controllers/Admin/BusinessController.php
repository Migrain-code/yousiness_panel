<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AdminBusinessesExport;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessNotification;
use App\Models\BusinessService;
use App\Models\BusinessTypeCategory;
use App\Models\BusinessWorkTime;
use App\Models\BusinnessType;
use App\Models\BussinessServicePartition;
use App\Models\DayList;
use App\Models\Device;
use App\Models\ServiceCategory;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $businesses = Business::query()
            ->orderBy('name','ASC')
            ->when($request->filled('name'), function ($q) use ($request) {
                $q->where('name', 'LIKE', "%$request->name%");
            })
            ->when($request->filled('phone'), function ($q) use ($request) {
                $q->where('phone', 'LIKE', "%$request->phone%");
            })
            ->when($request->filled('city'), function ($q) use ($request) {
                $q->where('city', $request->city);
            })
            ->when($request->filled('category_id'), function ($q) use ($request) {
                $q->whereHas('categories', function ($category) use ($request) {
                    $category->where('category_id', $request->input('category_id'));
                });
            })
            ->get();

            /*->when(($request->filled('age_start') || $request->filled('amp;age_end')), function ($q) use ($request) {
                if ($request->filled('age_start')) {
                    $q->where('birthday', '>=', $request->input('age_start'));
                }
                if ($request->filled('amp;age_end')) {
                    $q->where('birthday', '<=', $request->input('amp;age_end'));
                }
            });*/


        $categories = BusinessCategory::all();

        return view('admin.business.index', compact('businesses', 'categories'));
    }

    public function sendNotify(Request $request)
    {
        if (in_array('all', $request->businesses)) {
            $businesses = Business::all();
        } else {
            $businesses = Business::whereIn('id', $request->businesses)->get();
        }

        foreach ($businesses as $business) {
            $notification = new BusinessNotification();
            $notification->business_id = $business->id;
            $notification->title = $request->input('title');
            $notification->link = Str::slug($request->input('title'));
            $notification->message = $request->input('description');
            $notification->save();
            /*if ($business->permissions){
                if ($business->permissions->is_notification == 1) {


                    if ($business->device){
                        //push notification buraya gelecek
                    }
                }
            }*/
        }
        return back()->with('response', [
            'status' => "success",
            'message' => "Bildirimler Gönderildi",
        ]);
    }
    public function export()
    {
        $businesses = Business::all();
        return Excel::download(new AdminBusinessesExport($businesses), 'businesses.xlsx');
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
        $dayList=DayList::all();

        //dd($business->workTimes);
        $businessTypes=BusinnessType::all();
        $business_categories= BusinessCategory::all();

        $selectedCategories = [];
        foreach ($business->categories as $category){
            $selectedCategories[] = $category->category_id;
        }

        return view('admin.business.edit', compact('business', 'businessTypes', 'dayList', 'business_categories', 'selectedCategories'));
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
        $business= Business::find($request->input('business_id'));
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
            return back()->with('response', [
                'status'=>"success",
                'title'=>"Erfolgreich",
                'message'=>"Ihre Informationen wurden erfolgreich aktualisiert"
            ]);
        }
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

    public function updateOwner(Request $request)
    {
        $business= Business::find($request->input('business_id'));
        $business->owner=$request->owner;
        if ($business->email == $request->email){
            $business->email=$request->email;
        }
        else{
            $businessFind = Business::where('email', $request->email)->first();
            if($businessFind){
                return back()->with('response', [
                    'status'=>"danger",
                    'title'=>"Error",
                    'message'=>"Es ist bereits ein Benutzer mit dieser Mobilnummer registriert"
                ]);
            }
        }
        $business->owner_email=$request->input('owner_email');
        $business->phone=$request->phone;
        $business->password=Hash::make($request->input('password'));
        if ($business->save()){
            return back()->with('response', [
                'status'=>"success",
                'title'=>"Erfolgreich",
                'message'=>"Ihre Informationen wurden erfolgreich aktualisiert"
            ]);
        }
    }
    public function updateWorkTime(Request $request)
    {
        $business= Business::find($request->input('business_id'));
        $business->off_day = $request->input('day');
        $business->start_time = $request->input('start_time');
        $business->end_time = $request->input('end_time');
        $business->save();
        return back()->with('response', [
            'status'=>"success",
            'title'=>"success",
            'message'=>"Hier werden die Tage angezeigt, die nicht zu den Feiertagen Ihrer Mitarbeiter gehören. Sie müssen andere Feiertage als diese Tage für das Personal eingeben.niz Başarılı Bir Şekilde Güncellendi"
        ]);
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'category'=>"required",
        ], [], [
            'category'=>"Geschäftskategorien"
        ]);
        $business= Business::find($request->input('business_id'));

        if ($business->categories->count() > 0){
            foreach ($business->categories as $category) {
                $category->delete();
            }
        }
        foreach ($request->input('category') as $category){
            $businessCategory = new BusinessTypeCategory();
            $businessCategory->category_id = $category;
            $businessCategory->business_id = $business->id;
            $businessCategory->save();
        }
        return back()->with('response', [
            'status' => "success",
            'message' => "Unternehmenskategorien bearbeitet"
        ]);
    }

}
