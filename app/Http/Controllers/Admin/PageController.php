<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function index()
    {
        $pages=Page::latest()->get();
        return view('admin.page.index', compact('pages'));
    }
    public function updateStatus(Request $request)
    {
        $message="";
        $page=Page::find($request->id);
        if ($page->status == 1){
            $page->status=0;
            $message="Sayfa yayından kaldırıldı";
        }
        else{
            $page->status=1;
            $message="Sayfa yayına alındı";

        }
        if ($page->save()){
            return response()->json([
                'status'=>"success",
                'message'=>$message
            ]);
        }
    }
    public function create()
    {
        return view('admin.page.create');
    }

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
        $page=new Page();
        $page->title=$request->input('title');
        $page->slug=Str::slug($request->input('title'));
        $page->description=$request->input('description');
        $page->meta_keys=$request->input('meta_keys');
        $page->meta_description=$request->input('meta_description');
        $page->image="storage/".$request->file('image')->store('blog_images');
        if ($page->save()){
            return to_route('admin.page.index')->with('response', [
                'status'=>"success",
                'message'=>"Sayfa Başarılı Bir Şekilde Eklendi",
            ]);
        }
        return to_route('admin.page.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Sayfa Bir sistem hatası sebebiyle eklenemedi",
        ]);
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
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
        $page->title=$request->input('title');
        $page->slug=Str::slug($request->input('title'));
        $page->description=$request->input('description');
        $page->meta_keys=$request->input('meta_keys');
        $page->meta_description=$request->input('meta_description');
        if ($request->hasFile('image')){
            $page->image="storage/".$request->file('image')->store('blog_images');
        }
        if ($page->save()){
            return to_route('admin.page.index')->with('response', [
                'status'=>"success",
                'message'=>"Sayfa Başarılı Bir Şekilde Güncellendi",
            ]);
        }
        return to_route('admin.page.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Sayfa Bir sistem hatası sebebiyle Güncellenemedi",
        ]);
    }

    public function destroy(Page $page)
    {
        if ($page->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }

    public function datatable()
    {
        $query = Page::query();

        return DataTables::of($query)
            ->addColumn('action', function ($q) {
                $html = '';
                $html .= html()->a(route('admin.page.edit', $q->id), html()->i()->class('fa fa-edit'))->class('btn btn-primary mr-2');
                $html .= html()->a(route('admin.page.destroy', $q->id), html()->i()->class('fa fa-trash'))->class('btn btn-danger verifyAction mr-2');

                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}
