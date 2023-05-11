<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $socials=SocialMedia::latest()->get();
        return view('admin.social_media.index', compact('socials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //$request->dd();
        $request->validate([
            'title'=>"required",
            'image'=>"required",
            'link'=>"required",
        ], [], [
            'title'=>"Başlık",
            'image'=>"Görsel",
            'link'=>"Link"
        ]);
        $socialMedia=new SocialMedia();
        $socialMedia->title=$request->input('title');
        $socialMedia->link=$request->input('link');
        $socialMedia->image='storage/'.$request->file('image')->store('social_media_images');
        if ($socialMedia->save()){
            return to_route('admin.socialMedia.index')->with('response', [
                'status'=>"success",
                'message'=>"Sosyal medya paylaşımı eklendi",
            ]);
        }
        return to_route('admin.socialMedia.index')->with('response', [
            'status'=>"danger",
            'message'=>"Sistemsel bir hata sebebiyle Sosyal medya paylaşımı eklenemedi",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SocialMedia $socialMedia
     * @return Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        return view('admin.social_media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SocialMedia $socialMedia
     * @return Response
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $request->validate([
            'title'=>"required",
            'link'=>"required",
        ], [], [
            'title'=>"Başlık",
            'link'=>"Link"
        ]);

        $socialMedia->title=$request->input('title');
        $socialMedia->link=$request->input('link');
        if ($request->hasFile('image')){
            $socialMedia->image='storage/'.$request->file('image')->store('social_media_images');
        }
        if ($socialMedia->save()){
            return to_route('admin.socialMedia.index')->with('response', [
                'status'=>"success",
                'message'=>"Sosyal medya paylaşımı güncellendi",
            ]);
        }
        return to_route('admin.socialMedia.index')->with('response', [
            'status'=>"danger",
            'message'=>"Sistemsel bir hata sebebiyle Sosyal medya paylaşımı güncellenemedi",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SocialMedia $socialMedia
     * @return Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        if ($socialMedia->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
