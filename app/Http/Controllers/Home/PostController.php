<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Discussion;
use App\Models\Post;

class PostController extends Controller
{
    public function __invoke(PostStoreRequest $request, Discussion $discussion)
    {
        $post = Post::make($request->validated());
        $post->user()->associate($request->user());
        $post->discussion()->associate($discussion);
        $post->parent()->associate($discussion->post);
        $post->save();

        return redirect(route('single.show', $discussion) . '?post=' . $post->id);
    }
}
