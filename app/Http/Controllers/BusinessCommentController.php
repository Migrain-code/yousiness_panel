<?php

namespace App\Http\Controllers;

use App\Models\BusinessComment;
use Illuminate\Http\Request;

class BusinessCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.comment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessComment  $businessComment
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessComment $businessComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessComment  $businessComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessComment $businessComment)
    {
        return view('business.comment.edit', compact('businessComment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessComment  $businessComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessComment $businessComment)
    {
        $businessComment->content = $request->input('content');
        $businessComment->status = $request->input('status');
        $businessComment->save();

        return to_route('business.businessComment.index')->with('response', [
           'status' => "success",
           'message' => "Yorum Güncellendi"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessComment  $businessComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessComment $businessComment)
    {
        //
    }
}
