<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessFaq;
use Illuminate\Http\Request;

class BusinessFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs=BusinessFaq::latest()->get();
        return view('admin.business-faq.index', compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $businessFaq = new BusinessFaq();
        $businessFaq->question = $request->question;
        $businessFaq->answer = $request->answer;
        $businessFaq->save();

        return to_route('admin.businessFaq.index')->with('response', [
            'status'=>"success",
            'message'=>'S.S.S başarıyla eklendi'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessFaq  $businessFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessFaq $businessFaq)
    {
        $faq= $businessFaq;
        return view('admin.business-faq.edit', compact('faq'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessFaq  $businessFaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessFaq $businessFaq)
    {
        $faq=$businessFaq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return to_route('admin.businessFaq.index')->with('response', [
            'status'=>"success",
            'message'=>'S.S.S başarıyla güncellendi'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessFaq  $businessFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessFaq $businessFaq)
    {
        $businessFaq->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'S.S.S başarıyla silindi.'
        ]);
    }
}
