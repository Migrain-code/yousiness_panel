<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\BusinessTypeCategory;
use App\Models\BusinnessType;
use App\Models\BussinessPackage;
use App\Models\DayList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SetupController extends Controller
{
    public function step1()
    {
        $business_categories= BusinessCategory::all();

        $selectedCategories = [];
        foreach (auth('business')->user()->categories as $category){
            $selectedCategories[] = $category->category_id;
        }

        return view('business.setup.step-1', compact('business_categories', 'selectedCategories'));
    }

    public function step1Form(Request $request)
    {
        $request->validate([
            'category'=>"required",
        ], [], [
            'category'=>"İşletme Kategorisi/Kategorileri"
        ]);
        if (auth('business')->user()->categories->count() > 0){
            foreach ( auth('business')->user()->categories as $category) {
                $category->delete();
            }
        }
        foreach ($request->input('category') as $category){
            $businessCategory = new BusinessTypeCategory();
            $businessCategory->category_id = $category;
            $businessCategory->business_id = auth('business')->id();
            $businessCategory->save();
        }
        return to_route('business.setup.step2');
    }
    public function step2()
    {
        $business_types= BusinnessType::all();
        $dayList=DayList::orderBy('id', 'asc')->get();
        $business=auth('business')->user();

        return view('business.setup.step-2', compact('business_types', 'dayList', 'business'));
    }
    public function step2Form(Request $request)
    {
        //$request->dd();
        $request->validate([
            'name'=>'required',
            'business_type'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'offDay'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ],[],[
            'name'=>'İşletme Adınız',
            'business_type'=>'İşletme Tipi',
            'phone'=>'İşletme Telefonu',
            'city'=>'Şehir',
            'offDay'=>'Kapalı olduğu gün',
            'start_time'=>'Açılış Saati',
            'end_time'=>'Kapanış Saati',
        ]);
        $business=auth('business')->user();

        $business->name=$request->input('name');
        $business->slug = Str::slug($request->input('name'));
        $business->type_id=$request->input('business_type');
        $business->phone=$request->input('phone');
        $business->city=$request->input('city');
        $business->district=$request->input('district');
        $business->off_day=$request->input('offDay');
        $business->about=$request->input('business_about');
        $business->start_time=$request->input('start_time');
        $business->end_time=$request->input('end_time');
        $business->save();
        return to_route('business.setup.step3');
    }

    public function step3()
    {

        $business=auth('business')->user();
        return view('business.setup.step-3', compact('business'));
    }
    public function step3Form(Request $request)
    {
        $request->validate([
            'latitude' => "required",
            'address' => "required",
            'embed' => "required"
        ],[],[
            'address' => "İşletme Adresi",
            'embed' => "İşletme Harita Kodu",
            'latitude' => "Konum seçme"
        ]);
        $business=auth('business')->user();
        $business->address=$request->input('address');
        $business->embed=$request->input('embed');
        $business->lat=$request->input('latitude');
        $business->longitude = $request->input('longitude');
        $business->save();
        return to_route('business.setup.step4');
    }

    public function step4()
    {
        $monthlyPackages=BussinessPackage::where('type', 0)->get();
        $yearlyPackages=BussinessPackage::where('type', 1)->get();
        return view('business.setup.step-4', compact('monthlyPackages', 'yearlyPackages'));
    }
    public function step4Form(Request $request)
    {
        $request->validate([
            'package_id'=>'required',
        ],[],[
            'package_id'=>'Paket Seçim İşlemi',
        ]);
        $package =BussinessPackage::find($request->input('package_id'));
        session()->put('packet_id', $package->id);
        if ($package){
            if($package->price < 1){
                $business=auth('business')->user();
                $business->package_id=$request->input('package_id');
                $business->is_setup = 1;
                $business->save();
                return to_route('business.setup.step5');
            }
            else {
                return to_route('business.payment.form', $package->slug);
            }
        }

    }
    public function step5(Request $request)
    {
        dd(\Session::get('test'));
        return view('business.setup.step-5');
    }
}
