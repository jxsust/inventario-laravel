<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Delete an image and its file from storage.
     */
    public function destroy(Image $image)
    {
        Storage::delete($image->path);
        $image->delete();

        return response()->json(['message' => 'Imagen eliminada correctamente']);
    }
}
