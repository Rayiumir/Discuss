<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiscussionResource;
use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    protected const POSTS_PER_PAGE = 5;
    public function __invoke(Discussion $discussion, Request $request)
    {
        if ($postId = $request->get('post')) {
            return redirect()->route('single.show', [
                'discussion' => $discussion,
                'page' => $this->getPageForPost($discussion, $postId),
                'postId' => $postId
            ]);
        }

        $discussion->load(['topic', 'posts.discussion']);
        $discussion->loadCount('replies');

        return inertia()->render('Home/Show', [
            'query' => $request->query(),
            'discussion' => DiscussionResource::make($discussion),
            'posts' => PostResource::collection(Post::whereBelongsTo($discussion)
                ->with(['user', 'discussion'])
                ->oldest()
                ->paginate(self::POSTS_PER_PAGE)),
            'postId' => (int) $request->postId,
        ]);
    }

    protected function getPageForPost(Discussion $discussion, $postId)
    {
        $index = $discussion->posts->search(fn ($post) => $post->id == $postId);
        $page = (int) ceil(($index + 1) / self::POSTS_PER_PAGE);

        return $page;
    }
}
