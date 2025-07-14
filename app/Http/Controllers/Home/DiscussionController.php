<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discussion\DiscussionStoreRequest;
use App\Models\Discussion;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;


class DiscussionController extends Controller
{
    public function __invoke(DiscussionStoreRequest $request)
    {
        $discussion = Discussion::make([
            'title' => $request->title,
        ]);

        $discussion->user()->associate($request->user());
        $discussion->topic()->associate(Topic::find($request->topic_id));
        $discussion->save();

        $post = Post::make([
            'body' => $request->body,
        ]);

        $post->user()->associate($request->user());
        $discussion->posts()->save($post);

        return redirect()->route('single.show', $discussion);
    }
}
