<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('business.support.index');
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
        $support = new Support();
        $support->business_id = auth('business')->id();
        $support->subject = $request->subject;
        $support->content = $request->input('content');
        if ($support->save()){
            return back()->with('response', [
               'status' => "success",
               'message' => "Ihre Support Anfrage wurde gesendet"
            ]);
        }
        return back()->with('response', [
            'status' => "error",
            'message' => "Ihre Anfrage konnte aufgrund eines Systemfehlers nicht gesendet werden."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Support $support
     * @return Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Support $support
     * @return Response
     */
    public function edit(Support $support)
    {
        if ($support->business_id != auth('business')->id()){
            return to_route('business.support.index');
        }
        return view('business.support.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Support $support
     * @return Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Support $support
     * @return Response
     */
    public function destroy(Support $support)
    {
        if ($support->delete()){
            return response()->json([
               'status' => "success",
               'message' => "Destek Talebiniz Silindi",
            ]);
        }
    }
}
