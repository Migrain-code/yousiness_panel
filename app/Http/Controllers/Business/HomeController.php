<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        if (auth('business')->user()->password_status == 1){
            return view('business.update_password');
        }else{
            $appointment=[];
            $earning=0;

            foreach (auth('business')->user()->appointments as $row){
                if(Carbon::parse($row->start_time)->format('d.m.Y') == Carbon::now()->format('d.m.Y')){
                    $appointment[]=$row;
                }
                foreach ($row->services as $service){
                    $earning+=$service->service->price;
                }
            }

            $todayAppointment=count($appointment);
            return view('business.home', compact('todayAppointment', 'earning'));
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password'=>"required|confirmed",
        ], [], [
            'password'=>"Şifre",
        ]);
        $business=auth('business')->user();
        $business->password=Hash::make($request->input('password'));
        $business->password_status=0;
        if ($business->save()){
            return to_route('business.home')->with('response', [
                'status'=>"success",
                'message'=>"Şifreniz Güncellendi"
            ]);
        }
    }
    public function district(Request $request)
    {
        //$id get city idd
        $districts=District::where('city_id', $request->id)->get();
        return $districts;
    }

    public function subCategory(Request $request)
    {
        $subCategory=ServiceSubCategory::where('category_id', $request->id)->get();

        return $subCategory;
    }
}
