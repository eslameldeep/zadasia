<?php

namespace App\Domain\Core\Http\Controllers;

use App\Domain\Core\Http\Resources\FileResource;
use App\Domain\Core\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function uploadDropzone(Request $request)
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
}