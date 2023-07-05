<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ads=Ads::latest()->get();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required",
            'image'=>"required",
        ], [], [
            'title'=>"Başlık",
            'image'=>"Görsel",
        ]);
        $ads=new Ads();
        $ads->title=$request->input('title');
        $ads->link=$request->input('link');
        $ads->image='storage/'.$request->file('image')->store('adds_image');
        if ($ads->save()){
            return to_route('admin.ads.index')->with('response', [
                'status'=>"success",
                'message'=>"Reklam paylaşımı eklendi",
            ]);
        }
        return to_route('admin.ads.index')->with('response', [
            'status'=>"danger",
            'message'=>"Sistemsel bir hata sebebiyle Reklam paylaşımı eklenemedi",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ads $ads
     * @return Response
     */
    public function edit($id)
    {
        $ads=Ads::find($id);
        return view('admin.ads.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ads $ads
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=>"required",
        ], [], [
            'title'=>"Başlık",
        ]);
        $ads=Ads::find($id);
        $ads->title=$request->input('title');
        $ads->link=$request->input('link');
        if ($request->hasFile('image')){
            $ads->image='storage/'.$request->file('image')->store('adds_image');
        }
        if ($ads->save()){
            return to_route('admin.ads.edit', $ads->id)->with('response', [
                'status'=>"success",
                'message'=>"Reklam alanı güncellendi",
            ]);
        }
        return to_route('admin.ads.index')->with('response', [
            'status'=>"danger",
            'message'=>"Sistemsel bir hata sebebiyle reklam alanı güncellenemedi",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ads $ads
     * @return Response
     */
    public function destroy($id)
    {
        $ads=Ads::find($id);
        if ($ads->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
