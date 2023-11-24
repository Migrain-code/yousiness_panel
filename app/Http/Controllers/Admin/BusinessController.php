<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AdminBusinessesExport;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessNotification;
use App\Models\BusinessService;
use App\Models\BusinessWorkTime;
use App\Models\BusinnessType;
use App\Models\BussinessServicePartition;
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
