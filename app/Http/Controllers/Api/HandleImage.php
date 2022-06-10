<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class HandleImage
{
    public function index(ImageRequest $request)
    {
        # code...
        if ($request->hasFile('image')) {
            $userName = $request->user;
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fillName = explode('.',$fileName);
            $fileName = $fileName[0].'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/' . $userName,$fileName);
            return asset('storage/' . $userName .'/'. $fileName);
        }
    }
}
