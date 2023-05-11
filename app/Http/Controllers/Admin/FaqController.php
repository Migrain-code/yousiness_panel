<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index()
    {
        $faqs=Faq::latest()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return to_route('admin.faq.index')->with('response', [
            'status'=>"success",
            'message'=>'S.S.S başarıyla eklendi'
        ]);
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return to_route('admin.faq.index')->with('response', [
            'status'=>"success",
            'message'=>'S.S.S başarıyla güncellendi'
        ]);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'S.S.S başarıyla silindi.'
        ]);
    }

}
