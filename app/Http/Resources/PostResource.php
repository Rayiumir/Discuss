<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class PostResource extends JsonResource
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
            'body' => $this->body,
            'user' => PublicUserResource::make($this->whenLoaded('user')),
            'discussion' => DiscussionResource::make($this->whenLoaded('discussion')),
            'created_at' => DateTimeResource::make($this->created_at),
            'body_preview' => Str::limit($this->body, 200),
            'body_markdown' => app(MarkdownRenderer::class)->toHtml($this->body),
            'user_can' => [
                'edit' => auth()->check() && auth()->user()->can('edit', $this->resource),
                'delete' => auth()->check() && auth()->user()->can('delete', $this->resource),
            ]
        ];
    }
}
