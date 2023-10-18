<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BusinessBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=BusinessBlog::latest()->get();
        return view('admin.business-blog.index', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
            'image'=>"Foto",
        ]);
        $blog=new BusinessBlog();
        $blog->title=$request->input('title');
        $blog->slug=Str::slug($request->input('title'));
        $blog->description=$request->input('description');
        $blog->meta_keys=$request->input('meta_keys');
        $blog->meta_description=$request->input('meta_description');
        $blog->image="storage/".$request->file('image')->store('business_blog_images');
        if ($blog->save()){
            return to_route('admin.businessBlog.index')->with('response', [
                'status'=>"success",
                'message'=>"Blog Başarılı Bir Şekilde Eklendi",
            ]);
        }
        return to_route('admin.businessBlog.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Blog Bir sistem hatası sebebiyle eklenemedi",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessBlog  $businessBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessBlog $businessBlog)
    {
        $blog=$businessBlog;
        return view('admin.businessBlog.edit', compact('blog'));
    }

    public function updateStatus(Request $request)
    {
        $message="";
        $blog=BusinessBlog::find($request->id);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessBlog  $businessBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessBlog $businessBlog)
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
        $blog=$businessBlog;
        $blog->title=$request->input('title');
        $blog->slug=Str::slug($request->input('title'));
        $blog->description=$request->input('description');
        $blog->meta_keys=$request->input('meta_keys');
        $blog->meta_description=$request->input('meta_description');
        if ($request->hasFile('image')){
            $blog->image="storage/".$request->file('image')->store('business_blog_images');
        }
        if ($blog->save()){
            return to_route('admin.businessBlog.index')->with('response', [
                'status'=>"success",
                'message'=>"Blog Başarılı Bir Şekilde Güncellendi",
            ]);
        }
        return to_route('admin.businessBlog.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Blog Bir sistem hatası sebebiyle güncellenemedi",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessBlog  $businessBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessBlog $businessBlog)
    {
        //
    }
}
