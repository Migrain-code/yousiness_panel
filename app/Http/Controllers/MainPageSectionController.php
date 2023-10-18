<?php

namespace App\Http\Controllers;

use App\Models\MainPageSection;
use Illuminate\Http\Request;

class MainPageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainPageSections = MainPageSection::all();
        return view('admin.main_page_section.index', compact('mainPageSections'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mainPageSection = new MainPageSection();
        $mainPageSection->title = $request->input('title');
        $mainPageSection->description = $request->input('description');
        $mainPageSection->image = 'storage/' . $request->file('image')->store('mainPageSection');
        if ($mainPageSection->save()) {
            return to_route('admin.mainPageSection.index')->with('response', [
                'status' => "success",
                'message' => "Yeni bölüm anasayfaya eklendi",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MainPageSection $mainPageSection
     * @return \Illuminate\Http\Response
     */
    public function show(MainPageSection $mainPageSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MainPageSection $mainPageSection
     * @return \Illuminate\Http\Response
     */
    public function edit(MainPageSection $mainPageSection)
    {
        return view('admin.main_page_section.edit', compact('mainPageSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MainPageSection $mainPageSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainPageSection $mainPageSection)
    {
        $mainPageSection->title = $request->input('title');
        $mainPageSection->description = $request->input('description');
        if ($request->hasFile('image')) {
            $mainPageSection->image = 'storage/' . $request->file('image')->store('mainPageSection');
        }
        if ($mainPageSection->save()) {
            return to_route('admin.mainPageSection.index')->with('response', [
                'status' => "success",
                'message' => "bölüm güncellendi",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MainPageSection $mainPageSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainPageSection $mainPageSection)
    {
        if($mainPageSection->delete()){
            return response()->json([
               'status' => "success",
               'message' => "Bölüm Silindi"
            ]);
        }
    }
}
