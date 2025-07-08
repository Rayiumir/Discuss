<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('Home/Index', [
            'discussions' => DiscussionResource::collection(Discussion::with(['topic', 'post', 'latestPost.user', 'participants'])->latest()->paginate(10))
        ]);
    }
}
