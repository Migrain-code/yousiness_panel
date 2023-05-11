<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityBusiness;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $activities= Activity::latest()->get();
        return view('admin.activity.index', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required|min:3",
            'description'=>"required",
            'meta_keys'=>"required",
            'meta_description'=>"required",
            'image'=>"required",
            'start_date'=>"required",
            'stop_date'=>"required",
        ], [], [
            'title'=>"Başlık",
            'description'=>"Açıklama Metni",
            'meta_keys'=>"Meta anahtar kelimeleri",
            'meta_description'=>"Meta açıklama Metni",
            'image'=>"Görsel",
            'start_date'=>"Başlangıç Zamanı",
            'stop_date'=>"Bitiş Zamanı",
        ]);
        $activity=new Activity();
        $activity->title=$request->input('title');
        $activity->slug=Str::slug($request->input('title'));
        $activity->description=$request->input('description');
        $activity->meta_keys=$request->input('meta_keys');
        $activity->meta_description=$request->input('meta_description');
        $activity->image="storage/".$request->file('image')->store('activity_images');
        $activity->start_date=$request->input('start_date');
        $activity->stop_date=$request->input('stop_date');
        if ($activity->save()){
            return to_route('admin.activity.index')->with('response', [
                'status'=>"success",
                'message'=>"Etkinlik Başarılı Bir Şekilde Eklendi",
            ]);
        }
        return to_route('admin.activity.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Etkinlik Bir sistem hatası sebebiyle eklenemedi",
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Activity $activity
     * @return Response
     */
    public function edit(Activity $activity)
    {

        $b_id=[];
        $activityBusinesses=ActivityBusiness::where('activity_id', $activity->id)->get();
        foreach ($activityBusinesses as $business){
            $b_id[]=$business->business_id;
        }
        $businesses=[];
        foreach (Business::all() as $business){
            if (in_array($business->id, $b_id) == false){
               $businesses[]=$business;
            }
        }

        return view('admin.activity.edit', compact('activity', 'businesses'));
    }

    public function storeBusiness(Request $request)
    {
        $request->validate([
            'businesses'=>"required",
        ], [] ,[
            'businesses'=>"İşletme Seçme"
        ]);
        foreach ($request->businesses as $id){
            $activityBusiness=new ActivityBusiness();
            $activityBusiness->business_id=$id;
            $activityBusiness->activity_id=$request->activity_id;
            $activityBusiness->activity_code=Str::random(15);
            $activityBusiness->save();
        }
        return to_route('admin.activity.edit', $request->activity_id)->with('response', [
            'status'=>"success",
            'message'=>"Etkinliğe, İşletme Başarılı Bir Şekilde Eklendi",
        ]);
    }

    public function activityCancelled(Request $request)
    {
        $message="";
        $activityBusiness=ActivityBusiness::find($request->id);
        if ($activityBusiness->status==0){
            $activityBusiness->status=1;
            $message="İşletmenin Ektiniğe Katılımı Kabul Edildi";
        }
        else{
            $activityBusiness->status=0;
            $message="İşletmenin Ektiniğe Katılımı İptal Edildi";
        }

        if ($activityBusiness->save()){
            return response()->json([
                'status'=>"success",
                'message'=>$message
            ]);
        }
    }
    public function updateStatus(Request $request)
    {
        $message="";
        $blog=Activity::find($request->id);
        if ($blog->status == 1){
            $blog->status=0;
            $message="Etkinlik yayından kaldırıldı";
        }
        else{
            $blog->status=1;
            $message="Etkinlik yayına alındı";
        }
        if ($blog->save()){
            return response()->json([
                'status'=>"success",
                'message'=>$message
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Activity $activity
     * @return Response
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title'=>"required|min:3",
            'description'=>"required",
            'meta_keys'=>"required",
            'meta_description'=>"required",
            'start_date'=>"required",
            'stop_date'=>"required",
        ], [], [
            'title'=>"Başlık",
            'description'=>"Açıklama Metni",
            'meta_keys'=>"Meta anahtar kelimeleri",
            'meta_description'=>"Meta açıklama Metni",
            'start_date'=>"Başlangıç Zamanı",
            'stop_date'=>"Bitiş Zamanı",
        ]);
        $activity->title=$request->input('title');
        $activity->slug=Str::slug($request->input('title'));
        $activity->description=$request->input('description');
        $activity->meta_keys=$request->input('meta_keys');
        $activity->meta_description=$request->input('meta_description');
        if ($request->hasFile('image')){
            $activity->image="storage/".$request->file('image')->store('activity_images');
        }
        $activity->start_date=$request->input('start_date');
        $activity->stop_date=$request->input('stop_date');
        if ($activity->save()){
            return to_route('admin.activity.index')->with('response', [
                'status'=>"success",
                'message'=>"Etkinlik Başarılı Bir Şekilde Eklendi",
            ]);
        }
        return to_route('admin.activity.index')->with('response', [
            'status'=>"danger",
            'message'=>"Hata Etkinlik Bir sistem hatası sebebiyle eklenemedi",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return Response
     */
    public function destroy(Activity $activity)
    {
        if ($activity->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
