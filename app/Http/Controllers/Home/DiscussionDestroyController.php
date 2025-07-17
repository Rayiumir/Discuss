<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\DiscussionDestroyRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionDestroyController extends Controller
{
    public function __invoke(DiscussionDestroyRequest $request, Discussion $discussion)
    {
        $discussion->delete();
        return redirect()->route('home');
    }
}
