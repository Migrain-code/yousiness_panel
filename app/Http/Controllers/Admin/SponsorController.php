<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sponsors=Sponsor::all();
        return view('admin.sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sponsor=new Sponsor();
        $sponsor->name=$request->name;
        $sponsor->image='storage/'.$request->file('image')->store('sponsor');
        $sponsor->link=$request->link;
        if ($sponsor->save()){
            return to_route('admin.sponsor.index')->with('status', 'Sponsor Eklendi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Sponsor $sponsor
     * @return Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sponsor $sponsor
     * @return Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sponsor $sponsor
     * @return Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $sponsor->name=$request->name;
        if ($request->hasFile('image')){
            $sponsor->image='storage/'.$request->file('image')->store('sponsor');
        }
        $sponsor->link=$request->link;
        if ($sponsor->save()){
            return to_route('admin.sponsor.index')->with('status', 'Sponsor Güncellendi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sponsor $sponsor
     * @return Response
     */
    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->delete()){
            return response()->json([
                'status' => 'success',
                'message' => 'Sponsor başarıyla silindi.'
            ]);
        }
    }
    public function datatable()
    {
        $query = Sponsor::query()->latest();

        return DataTables::of($query)
            ->editColumn('image', function ($q) {
                return html()->img(asset($q->image))->style('width:90px');
            })
            ->addColumn('action', function ($q) {
                $html = '';
                $html .= html()->a(route('admin.sponsor.edit', $q->id), html()->i()->class('fa fa-edit'))->class('btn btn-primary mr-2');
                $html .= html()->a(route('admin.sponsor.destroy', $q->id), html()->i()->class('fa fa-trash'))->class('btn btn-danger verifyAction mr-2');

                return $html;
            })
            ->make(true);

    }
}
