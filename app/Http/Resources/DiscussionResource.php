<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscussionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'username' => $this->user->name,
            'body' => $this->body,
            'topic_title' => $this->topic->title,
            'create_time' => $this->created_at->format('Y-m-d H:i:s'),
            'likes' => $this->likes
        ];
    }
}
