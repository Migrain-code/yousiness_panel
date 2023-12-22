<?php

namespace App\Http\Controllers;

use App\Models\BusinessContact;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $businessContacts = BusinessContact::orderBy('status')->latest()->get();
        return view('admin.business-contact.index', compact('businessContacts'));
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
     * Display the specified resource.
     *
     * @param BusinessContact $businessContact
     * @return Response
     */
    public function show(BusinessContact $businessContact)
    {
        return view('admin.business-contact.edit', compact('businessContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BusinessContact $businessContact
     * @return Response
     */
    public function update(Request $request, BusinessContact $businessContact)
    {
        $businessContact->status = 1;
        if ($businessContact->save()){
            return to_route('admin.businessContact.index')->with('response', [
                'status' => "success",
                'message' => "İletişim Mesajı Güncellendi"
            ]);
        }
        return to_route('admin.businessContact.index')->with('response', [
            'status' => "error",
            'message' => "Bir hata sebebi ile iletişim mesajı durumu güncellenemedi."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Support $support
     * @return Response
     */
    public function destroy(BusinessContact $businessContact)
    {
        if ($businessContact->delete()){
            return response()->json([
                'status' => "success",
                'message' => "İletişim Mesajı Silindi",
            ]);
        }
    }
}
