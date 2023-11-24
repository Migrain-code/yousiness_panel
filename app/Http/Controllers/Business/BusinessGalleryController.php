<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\BusinessGallery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BusinessGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('business.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        foreach( $request->file('images') as $image)
        {
            $businessGallery=new BusinessGallery();
            $businessGallery->business_id=auth('business')->id();
            $businessGallery->way='storage/'.$image->store('businessGallery');
            $businessGallery->name=$image->getClientOriginalName();
            $businessGallery->byte=$image->getSize();/*max 52.428.800 byte*/
            $businessGallery->save();
        }
        return to_route('business.gallery.index')->with('response', [
            'status'=>"success",
            'title'=>"Erfolgreich",
            'message'=>"Foto zur Galerie hinzugefügt"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param BusinessGallery $businessGallery
     * @return Response
     */
    public function show(BusinessGallery $businessGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BusinessGallery $businessGallery
     * @return Response
     */
    public function edit(BusinessGallery $businessGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BusinessGallery $businessGallery
     * @return Response
     */
    public function update(Request $request, BusinessGallery $businessGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BusinessGallery $gallery
     * @return Response
     */
    public function destroy(BusinessGallery $gallery)
    {
        Storage::delete(str_replace('storage/', '', $gallery->way));
        if ($gallery->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
