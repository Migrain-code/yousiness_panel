<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BussinessPackage;
use App\Models\Admin\BussinessPackagePropartie;
use App\Models\BussinessPackagePropartieList;
use App\Models\Propartie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BussinessPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $packages=BussinessPackage::all();
        return view('admin.business_package.index', compact('packages'));
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
            'name'=>"required",
            'price'=>"required",
            'type'=>"required",
            'stripe_key' => "required",
            'packet_icon' => "required",
        ],[], [
            'name'=>"Paketname",
            'price'=>"Preis",
            'type'=>"Art",
            'stripe_key' => "Stripe KEY",
            'packet_icon' => "Icon",
        ]);
        $bussinessPackage=new BussinessPackage();
        $bussinessPackage->name=$request->input('name');
        $bussinessPackage->slug=Str::slug($request->input('name'));
        $bussinessPackage->type=$request->input('type');
        $bussinessPackage->price=$request->input('price');
        if ($request->hasFile('packet_icon')){
            $bussinessPackage->icon = 'storage/'. $request->file('packet_icon')->store('packetIcons');
        }
        $bussinessPackage->stripe_key = $request->input('stripe_key');
        if ($bussinessPackage->save()){
            return to_route('admin.businessPackage.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Paket Eklendi"
            ]);
        }
    }

    public function edit($id)
    {
        $bussinessPackage=BussinessPackage::find($id);

        $list=BussinessPackagePropartieList::all();

        $propartieList=[];

        foreach ($bussinessPackage->proparties as $item){
            $propartieList[]=$item->propartie_id;
        }

        return view('admin.business_package.edit', compact('bussinessPackage', 'propartieList', 'list'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>"required",
            'price'=>"required",
            'type'=>"required",
            'stripe_key' => "required",
        ],[], [
            'name'=>"Paketname",
            'price'=>"Preis",
            'type'=>"Art",
            'stripe_key' => "Stripe KEY",
        ]);
        $bussinessPackage=BussinessPackage::find($id);

        $bussinessPackage->name=$request->input('name');
        $bussinessPackage->type=$request->input('type');
        $bussinessPackage->price=$request->input('price');
        $bussinessPackage->stripe_key = $request->input('stripe_key');
        if ($request->hasFile('packet_icon')){
            $bussinessPackage->icon = 'storage/'. $request->file('packet_icon')->store('packetIcons');
        }
        if ($bussinessPackage->save()){
            BussinessPackagePropartie::where('package_id', $bussinessPackage->id)->delete();
            foreach ($request->propartie as $item){
                $bussinessPackagePropartie=new BussinessPackagePropartie();
                $bussinessPackagePropartie->package_id=$bussinessPackage->id;
                $bussinessPackagePropartie->propartie_id=$item;
                $bussinessPackagePropartie->save();
            }
            return to_route('admin.businessPackage.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Paket Bilgileri Güncellendi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BussinessPackage $bussinessPackage
     * @return Response
     */
    public function destroy(BussinessPackage $bussinessPackage)
    {
        if ($bussinessPackage->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
