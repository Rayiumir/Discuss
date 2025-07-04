<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function __invoke(Discussion $discussion)
    {
        return inertia()->render('Home/Show', [
            'discussion' => DiscussionResource::make($discussion)
        ]);
    }
}
