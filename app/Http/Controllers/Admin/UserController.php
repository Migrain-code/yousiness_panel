<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->birthday = $request->birthday;
        $user->job = $request->job;
        if ($request->hasFile('image')) {
            $user->image = 'storage/' . $request->file('image')->store('user-profile');
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return to_route('admin.user.index')->with('status', 'Kullanıcı başarıyla eklendi');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->birthday = $request->birthday;
        $user->job = $request->job;
        if ($request->hasFile('image')) {
            $user->image = 'storage/' . $request->file('image')->store('user-profile');
        }
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return to_route('admin.user.index')->with('status', 'Kullanıcı başarıyla güncellendi');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Kullanıcı başarıyla silindi.'
        ]);
    }

    public function datatable()
    {
        $query = User::latest();

        return DataTables::of($query)
            ->editColumn('image', function ($q) {
                return html()->img(asset($q->image))->style('width:90px');
            })
            ->addColumn('action', function ($q) {
                $html = '';
                $html .= html()->a(route('admin.user.edit', $q->id), html()->i()->class('fa fa-edit'))->class('btn btn-primary mr-2');
                $html .= html()->a(route('admin.user.destroy', $q->id), html()->i()->class('fa fa-trash'))->class('btn btn-danger verifyAction mr-2');

                return $html;
            })
            ->rawColumns(['logo', 'action'])
            ->make(true);

    }
}
