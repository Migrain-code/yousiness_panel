<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
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
        }
        else{

            $earning=0;

            $todayAppointments = Appointment::where('business_id', auth('business')->id())
                ->where('status', 1)
                ->where('date', Carbon::now()->format('Y-m-d'))
                ->latest()
                ->get();

            $appointments = auth('business')->user()->appointments()->where('status', 4)->get();
            $totalAppointments = auth('business')->user()->appointments()->count();
            foreach ($appointments as $row){
                    $earning+=$row->calculateTotal($row->services);
            }

            return view('business.home', compact('todayAppointments', 'earning', 'totalAppointments'));
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password'=>"required|confirmed",
        ], [], [
            'password'=>"Passwort",
        ]);
        $business=auth('business')->user();
        $business->password=Hash::make($request->input('password'));
        $business->password_status=0;
        if ($business->save()){
            return to_route('business.home')->with('response', [
                'status'=>"success",
                'message'=>"Ihr Passwort wurde aktualisiert"
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
