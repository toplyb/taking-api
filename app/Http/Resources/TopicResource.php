<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'username' => $this->user->name,
//            'discussion' => $this->discussion,
            'discussion' => DiscussionResource::collection($this->discussion),
            'create_time' => $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
