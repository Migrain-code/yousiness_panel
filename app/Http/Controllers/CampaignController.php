<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignCustomer;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.campaign.index');
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
        if (auth('business')->user()->customers->count() > 0){
            return back()->with('response', [
               'status' => "warning",
               'message' => "Müşterilerinize kampanya tanımlayabilirsiniz. Ancak müşteri sayınız 0 olduğu için kampanya oluşturamazsınız."
            ]);
        }
        $request->validate([
            'title' => "required",
            'code' => "required|min:4",
            'discount' => "required",
            'start_time' => "required",
            'end_time' => "required|after:start_time",
            'description' => "required",
        ]);
        $campaign = new Campaign();
        $campaign->business_id = auth('business')->id();
        $campaign->title = $request->input('title');
        $campaign->code = $request->input('code');
        $campaign->discount = $request->input('discount');
        $campaign->start_time = $request->input('start_time');
        $campaign->end_date = $request->input('end_time');
        $campaign->description = $request->input('description');
        $campaign->status = 1;
        if ($campaign->save()){
            foreach (auth('business')->user()->customers as $customer){
                $campaignCustomer = new CampaignCustomer();
                $campaignCustomer->campaign_id = $campaign->id;
                $campaignCustomer->customer_id = $customer->customer_id;
                $campaignCustomer->save();
            }
            return back()->with('response', [
               'status' => "success",
               'message' => "Kampanya Oluşturuldu",
            ]);
        }
        return back()->with('response', [
            'status' => "danger",
            'message' => "Hata Kampanya Oluşturulamadı",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('business.campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title' => "required",
            'code' => "required|min:4",
            'discount' => "required",
            'start_time' => "required",
            'end_time' => "required|after:start_time",
            'description' => "required",
        ]);

        $campaign->title = $request->input('title');
        $campaign->code = $request->input('code');
        $campaign->discount = $request->input('discount');
        $campaign->start_time = $request->input('start_time');
        $campaign->end_date = $request->input('end_time');
        $campaign->description = $request->input('description');
        $campaign->status = 1;
        if ($campaign->save()){
            /*foreach (auth('business')->user()->customers as $customer){
                $campaignCustomer = new CampaignCustomer();
                $campaignCustomer->campaign_id = $campaign->id;
                $campaignCustomer->customer_id = $customer->customer_id;
                $campaignCustomer->save();
            }*/
            return back()->with('response', [
                'status' => "success",
                'message' => "Kampanya Güncellendi",
            ]);
        }
        return back()->with('response', [
            'status' => "danger",
            'message' => "Hata Kampanya Güncellenemedi",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        if ($campaign->delete()){
            return response()->json([
               'status' => "success",
               'message' => "Silindi"
            ]);
        }
    }
}
