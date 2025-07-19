<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $userDiscussionCount = Discussion::where('user_id', $request->user()->id)->count();
        $userPostCount = Post::where('user_id', $request->user()->id)->count();

        return Inertia::render('Dashboard', [
            'userDiscussionCount' => $userDiscussionCount,
            'userPostCount' => $userPostCount,
        ]);
    }
}
