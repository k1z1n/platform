<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->hasFile('files')) {
            return response()->json(['message' => 'No files uploaded'], 400);
        }

        $uploadedFiles = [];
        $files = $request->file('files');

        foreach ($files as $file) {
            if ($file->isValid()) {
                $path = $file->store('uploads');
                $uploadedFiles[] = $path;
            }
        }

        return response()->json([
            'message' => 'Files uploaded successfully',
            'files' => $uploadedFiles
        ], 200);
    }

}
