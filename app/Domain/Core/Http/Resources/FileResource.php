<?php

namespace App\Domain\Core\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    public function toArray($request)
    {
        $type = substr($this->mime_type, 0, strpos($this->mime_type, '/'));
        if ($type == "image") {
            return [
                'id' => $this->id,
                'url' => $this->original_url,
                'location' => $this->original_url ,
                'webp' => $this->getUrl(),
                "name" => $this->name,
                "mime_type" => $this->mime_type,
                "size" =>  $this->formatSizeUnits($this->size) ,
                "extension" => pathinfo($this->file_name, PATHINFO_EXTENSION),
            ];
        } else {
            return [
                'id' => $this->id,
                'url' => $this->original_url,
                'location' => $this->original_url ,
                "name" => $this->name,
                "mime_type" => $this->mime_type,
                "size" =>  $this->formatSizeUnits($this->size),
                "extension" => pathinfo($this->file_name, PATHINFO_EXTENSION),
            ];
        }
    }
}
