<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status
        ];
    }

    public function with($request)
    {
        return [
            'author_url' => url('https://github.com/vuksamardzic'),
            'version' => '1.0.0',
        ];
    }
}
