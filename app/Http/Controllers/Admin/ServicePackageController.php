<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propartie;
use App\Models\ServicePackage;
use App\Models\ServicePackagePropartie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Symfony\Component\String\s;

class ServicePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $packages=ServicePackage::all();
        return view('admin.service_package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $proparties= Propartie::orderBy('name')->get();
        return view('admin.service_package.create', compact('proparties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $package=new ServicePackage();
        $package->title=$request->input('title');
        $package->price=$request->input('price');
        if ($package->save()){
            foreach ($request->propartie as $propartie_id){
                $package_proparties=new ServicePackagePropartie();
                $package_proparties->package_id=$package->id;
                $package_proparties->propartie_id=$propartie_id;
                $package_proparties->save();
            }
            return to_route('admin.servicePackage.index')->with('response', [
                'status'=>"success",
                'title'=>"Başarılı",
                'message'=>"Paket Eklendi"
            ]);
        }
        return to_route('admin.servicePackage.index')->with('response', [
            'status'=>"danger",
            'title'=>"Hata",
            'message'=>"Bir hata sebebi ile Özellik Eklenemedi"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ServicePackage $servicePackage
     * @return Response
     */
    public function show(ServicePackage $servicePackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ServicePackage $servicePackage
     * @return Response
     */
    public function edit(ServicePackage $servicePackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServicePackage $servicePackage
     * @return Response
     */
    public function update(Request $request, ServicePackage $servicePackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServicePackage $servicePackage
     * @return Response
     */
    public function destroy(ServicePackage $servicePackage)
    {

        if ($servicePackage->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
