<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaingPage;
use Illuminate\Http\Request;

class MaingPageController extends Controller
{
    public function userEdit()
    {

        $sections = [];
        foreach (MaingPage::all() as $item) {
            $sections[$item->name] = $item->value;
        }
        return view('admin.main-page.user', compact('sections'));
    }

    public function businessEdit()
    {
        $sections = [];
        foreach (MaingPage::all() as $item) {
            $sections[$item->name] = $item->value;
        }
        return view('admin.main-page.business', compact('sections'));
    }
    public function section_update(Request $request)
    {
        foreach ($request->except('_token') as $key => $item) {
            if ($request->hasFile($key)) {
                $item = 'storage/' . $request->file($key)->store('forBusiness');
            }

            $query = MaingPage::query()->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    $query->save();
                }
            } else {
                $newQuery = new MaingPage();
                $newQuery->name = $key;
                $newQuery->value = $item;
                $newQuery->save();
            }
        }
        if (\request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Anasayfa başarıyla kaydedildi.'
            ]);
        } else {
            return back()->with('response', [
                'status'=>"success",
                'message'=>"Anasayfa güncellendi."
            ]);
        }
    }
}
