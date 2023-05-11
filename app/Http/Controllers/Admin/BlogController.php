<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs=Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
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
            'title'=>"required|min:3",
            'description'=>"required",
            'meta_keys'=>"required",
            'meta_description'=>"required",
            'image'=>"required",
        ], [], [
            'title'=>"Başlık",
            'description'=>"Açıklama Metni",
            'meta_keys'=>"Meta anahtar kelimeleri",
            'meta_description'=>"Meta açıklama Metni",
            'image'=>"Görsel",
        ]);
        $blog=new Blog();
        $blog->title=$request->input('title');
        $blog->slug=Str::slug($request->input('title'));
        $blog->description=$request->input('description');
        $blog->meta_keys=$request->input('meta_keys');
        $blog->meta_description=$request->input('meta_description');
        $blog->image="storage/".$request->file('image')->store('blog_images');
        if ($blog->save()){
            return to_route('admin.blog.index')->with('response', [
                'status'=>"success",
                'message'=>"Blog Başarılı Bir Şekilde Eklendi",
            ]);
        }
        return to_route('admin.blog.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Blog Bir sistem hatası sebebiyle eklenemedi",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function updateStatus(Request $request)
    {
        $message="";
        $blog=Blog::find($request->id);
        if ($blog->status == 1){
            $blog->status=0;
            $message="Blog yayından kaldırıldı";
        }
        else{
            $blog->status=1;
            $message="Blog yayına alındı";

        }
        if ($blog->save()){
            return response()->json([
                'status'=>"success",
                'message'=>$message
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return Response
     */
    public function update(Request $request, Blog $blog)
    {


        $request->validate([
            'title'=>"required|min:3",
            'description'=>"required",
            'meta_keys'=>"required",
            'meta_description'=>"required",
        ], [], [
            'title'=>"Başlık",
            'description'=>"Açıklama Metni",
            'meta_keys'=>"Meta anahtar kelimeleri",
            'meta_description'=>"Meta açıklama Metni",
        ]);

        $blog->title=$request->input('title');
        $blog->slug=Str::slug($request->input('title'));
        $blog->description=$request->input('description');
        $blog->meta_keys=$request->input('meta_keys');
        $blog->meta_description=$request->input('meta_description');
        if ($request->hasFile('image')){
            $blog->image="storage/".$request->file('image')->store('blog_images');
        }
        if ($blog->save()){
            return to_route('admin.blog.index')->with('response', [
                'status'=>"success",
                'message'=>"Blog Başarılı Bir Şekilde Güncellendi",
            ]);
        }
        return to_route('admin.blog.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Blog Bir sistem hatası sebebiyle güncellenemedi",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
