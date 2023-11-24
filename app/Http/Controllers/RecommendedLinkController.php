<?php

namespace App\Http\Controllers;

use App\Models\RecommendedLink;
use Illuminate\Http\Request;

class RecommendedLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommendedLinks = RecommendedLink::all();
        return view('admin.recommended.index', compact('recommendedLinks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $recommendedLink = new RecommendedLink();
        $recommendedLink->title=$request->input('title');
        $recommendedLink->url = $request->input('link');
        if ($recommendedLink->save()){
            return to_route('admin.recommendedLink.index')->with('response', [
                'status' => "success",
                'message' => 'Empfohlener Link hinzugefügt'
            ]);
        }
        return to_route('admin.recommendedLink.index')->with('response', [
            'status' => "error",
            'message' => 'Es ist ein Systemfehler aufgetreten'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecommendedLink  $recommendedLink
     * @return \Illuminate\Http\Response
     */
    public function show(RecommendedLink $recommendedLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecommendedLink  $recommendedLink
     * @return \Illuminate\Http\Response
     */
    public function edit(RecommendedLink $recommendedLink)
    {
        return view('admin.recommended.edit', compact('recommendedLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecommendedLink  $recommendedLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecommendedLink $recommendedLink)
    {
        $recommendedLink->title=$request->input('title');
        $recommendedLink->url = $request->input('link');
        $recommendedLink->status = boolval($request->status);
        if ($recommendedLink->save()){
            return to_route('admin.recommendedLink.index')->with('response', [
                'status' => "success",
                'message' => 'Empfohlener Link aktualisiert'
            ]);
        }
        return to_route('admin.recommendedLink.index')->with('response', [
            'status' => "error",
            'message' => 'Es ist ein Systemfehler aufgetreten'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecommendedLink  $recommendedLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecommendedLink $recommendedLink)
    {
        //
    }
}
