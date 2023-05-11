<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
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
