<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
            'participants' => PublicUserResource::collection($this->whenLoaded('participants')),
            'solution' => PostResource::make($this->whenLoaded('solution')),
            'replies_count' => $this->replies_count,
            'isPinned' => $this->isPinned(),
            'user_can' => [
                'reply' => auth()->check() && auth()->user()->can('reply', $this->resource),
                'delete' => auth()->check() && auth()->user()->can('delete', $this->resource),
                'solve' => auth()->check() && auth()->user()->can('solve', $this->resource),
            ]
        ];
    }
}
