<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscussionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'topic' => TopicResource::make($this->whenLoaded('topic')),
            'post' => PostResource::make($this->whenLoaded('post')),
            'latest_post' => PostResource::make($this->whenLoaded('latestPost')),
            'is_pinned' => $this->isPinned()
        ];
    }
}
