<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostEditRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostEditController extends Controller
{
    public function __invoke(PostEditRequest $request, Post $post)
    {
        $post->update($request->validated());
        return back();
    }
}
