<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $infos=BusinessInfo::latest()->get();
        return view('admin.info.index', compact('infos'));

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
    public function updateStatus(Request $request)
    {
        $message="";
        $info=BusinessInfo::find($request->id);
        if ($info->status == 1){
            $info->status=0;
            $message="Aranmadı olarak güncellendi";
        }
        else{
            $info->status=1;
            $message="Arandı olarak güncellendi";

        }
        if ($info->save()){
            return response()->json([
                'status'=>"success",
                'status_code' => $info->status,
                'message'=>$message
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BusinessInfo $businessInfo
     * @return Response
     */
    public function destroy(BusinessInfo $businessInfo)
    {
        if ($businessInfo->delete()){
            return response()->json([
               'status'=>"success"
            ]);
        }
    }
}
