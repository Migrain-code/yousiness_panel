<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function search(Request $request)
    {
        $cities = \App\Models\City::where('name', 'like', '%' . $request->q . '%')
            ->orWhere('post_code', 'like', '%' . $request->q . '%')
            ->take(50)
            ->get();

        return response()->json([
            'cities' => $cities,
        ]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $folderName = $request->input('folderName');

        $path = $file->store($folderName,'public');
        $way = 'storage/'.$path;

        return [
            'status' => "success",
            'message' => "Dosya Yüklendi",
            'image' => $way,
        ];
    }
}
