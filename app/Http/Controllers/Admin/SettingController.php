<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Maatwebsite\Excel\Facades\Excel;

class SettingController extends Controller
{

    public function businessEdit()
    {
        return view('admin.settings.business');
    }
    public function userEdit()
    {
        return view('admin.settings.user');
    }

    public function uCategory()
    {
        /*Excel::import(new CategoryImport(), 'C:\\Users\\Migrain\\Desktop\\hizli_randevu\\hizli_randevu.xlsx');*/
    }
    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $item) {
            if ($request->hasFile($key)) {
                $item = 'storage/' . $request->file($key)->store('settings');
            }

            $query = Setting::query()->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    $query->save();
                }
            } else {
                $newQuery = new Setting();
                $newQuery->name = $key;
                $newQuery->value = $item;
                $newQuery->save();
            }
        }

        if (\request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ayarlar başarıyla kaydedildi.'
            ]);
        } else {
            return back()->with('response', [
                'status'=>"success",
                'message'=>"Ayarlar Güncellendi"
            ]);
        }
    }
}
