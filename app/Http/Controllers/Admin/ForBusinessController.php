<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForBusiness;
use App\Models\Swiper;
use Illuminate\Http\Request;

class ForBusinessController extends Controller
{
    public function index()
    {
        $swipers=Swiper::latest()->get();
        $sections = [];
        foreach (ForBusiness::all() as $item) {
            $sections[$item->name] = $item->value;
        }

        return view('admin.for_business.index', compact('sections', 'swipers'));
    }

    public function section_update(Request $request)
    {
        foreach ($request->except('_token') as $key => $item) {
            if ($request->hasFile($key)) {
                $item = 'storage/' . $request->file($key)->store('forBusiness');
            }

            $query = ForBusiness::query()->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    $query->save();
                }
            } else {
                $newQuery = new ForBusiness();
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
                'message'=>"İşletmeler İçin Sayfası güncellendi."
            ]);
        }
    }
}
