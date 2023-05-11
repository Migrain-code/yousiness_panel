<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Swiper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SwiperController extends Controller
{

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
        ], [],[
            'image'=>"Görsel",
            'title'=>"Başlık"
        ]);
        $swiper=new Swiper();
        $swiper->title=$request->input('title');
        $swiper->link=$request->input('link');
        $swiper->image=$request->file('image')->store('swiper_images');
        if ($swiper->save()){
            return to_route('admin.forBusiness.index')->with('response', [
                'status'=>"success",
                'message'=>"Kayan Metin Alanı Eklendi."
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Swiper $swiper
     * @return Response
     */
    public function edit(Swiper $swiper)
    {
        return view('admin.swiper.edit', compact('swiper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Swiper $swiper
     * @return Response
     */
    public function update(Request $request, Swiper $swiper)
    {
        $request->validate([
            'title'=>"required",
        ], [],[
            'title'=>"Başlık"
        ]);
        $swiper->title=$request->input('title');
        $swiper->link=$request->input('link');
        if ($request->hasFile('image')){
            $swiper->image=$request->file('image')->store('swiper_images');
        }
        if ($swiper->save()){
            return to_route('admin.forBusiness.index')->with('response', [
                'status'=>"success",
                'message'=>"İşletmeler İçin Sayfası güncellendi."
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Swiper $swiper
     * @return Response
     */
    public function destroy(Swiper $swiper)
    {
        if ($swiper->delete()){
            return response()->json([
               'status'=>"success",
            ]);
        }
    }
}
