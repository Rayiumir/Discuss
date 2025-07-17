<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostDestroyRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostDestroyController extends Controller
{
    public function __invoke(PostDestroyRequest $request, Post $post)
    {
        $post->delete();
        return back();
    }
}
