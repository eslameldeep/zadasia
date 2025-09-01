<?php

namespace App\Domain\Core\Http\Controllers;

use App\Domain\Core\Http\Resources\FileResource;
use App\Domain\Core\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Image;


class DashboardController extends Controller
{

    public function uploadDropzone(Request $request)
    {

        if (is_array($request->file)) {
            $media = File::create();
            foreach ($request->file as $file) {
                [$width, $height] = $this->getDimensions($request->file);

                $ext = $file->getClientOriginalExtension();
                $media->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext") ->withCustomProperties($width || $height ? compact('width', 'height') : [])->toMediaCollection();
            }

            return responseJson(200, 'success', FileResource::collection($media->files));
        } else {
            if ($request->file) {
                [$width, $height] = $this->getDimensions($request->file); // here we get a width/height
                $media = File::create();
                $file = $request->file;
                $ext = $file->getClientOriginalExtension();
                $media->addMedia($file)  ->withCustomProperties($width || $height ? compact('width', 'height') : [])->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection();

                return responseJson(200, 'success', new FileResource($media->getFirstMedia()));
            }
        }

        if ($request->link && !$request->file) {
            $media = File::create();
            $media->addMediaFromUrl($request->link)->toMediaCollection();
            return responseJson(200, 'success', new FileResource($media->getFirstMedia()));
        }
        return responseJson(400, __('unsuccessful'));

    }


    public function uploadTinymce(Request $request)
    {


        if (is_array($request->file)) {
            $media = File::create();
            foreach ($request->file as $file) {
                $ext = $file->getClientOriginalExtension();
                $media->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection();
            }

            return responseJson(200, 'success', FileResource::collection($media->files));
        } else {
            if ($request->file) {
                $media = File::create();
                $file = $request->file;
                $ext = $file->getClientOriginalExtension();
                $media->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection();

                return responseJson(200, 'success', new FileResource($media->getFirstMedia()));
            }
        }

        if ($request->link && !$request->file) {
            $media = File::create();
            $media->addMediaFromUrl($request->link)->toMediaCollection();
            return responseJson(200, 'success', new FileResource($media->getFirstMedia()));
        }
        return responseJson(400, __('unsuccessful'));

    }

    private function getDimensions(UploadedFile $file): array
    {
        try {
            $image = Image::load($file->getPathname());

            return [$image->getWidth(), $image->getHeight()];
        } catch (\Throwable $e) {
            return [null, null];
        }
    }


}
