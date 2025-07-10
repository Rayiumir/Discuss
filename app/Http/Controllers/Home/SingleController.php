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
    public function __invoke(Discussion $discussion)
    {
        $discussion->load(['topic']);
        $discussion->loadCount('replies');

        return inertia()->render('Home/Show', [
            'discussion' => DiscussionResource::make($discussion),
            'posts' => PostResource::collection(Post::whereBelongsTo($discussion)
                ->with(['user', 'discussion'])
                ->oldest()
                ->paginate(10))
        ]);
    }
}
