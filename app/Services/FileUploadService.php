<?php

namespace App\Services;

use Illuminate\Http\Request;

class FileUploadService
{
    public static function getFileData (Request $request)
    {
        if ($request->logo) {
            $request->validate([
                'logo' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $request->validated();
            $fileName = $request->logo->hashName();
            $request->logo->move(public_path('images'), $fileName);
            return $fileName;
        }
        return null;
    }
}
