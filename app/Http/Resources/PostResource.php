<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'data'=>[
                'id' => $this->id,
                'title' => $this->title,
                'body' => $this->body,
                'created_at' => $this->created_at,
                'user' => [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                ]
            ]
        ];
    }
}
