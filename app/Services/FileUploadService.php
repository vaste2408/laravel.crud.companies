<?php

namespace App\Services;

use Illuminate\Http\Request;

class FileUploadService
{
    /**
     * Validates income file request if some.
     * Moves file to /public/image.
     * Returns filename if had file in request, null otherwise
     * @param Request $request
     * @return null
     */
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
