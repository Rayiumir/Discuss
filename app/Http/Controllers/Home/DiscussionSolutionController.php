<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscussionSolutionController extends Controller
{
    public function __invoke(DiscussionSolutionRequest $request, Discussion $discussion)
    {
        $discussion->solution()->associate($discussion->posts()->find($request->post_id));
        $discussion->save();

        return back();
    }
}
