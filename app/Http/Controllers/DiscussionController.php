<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Resources\DiscussionResource;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
    }

    public function index()
    {
        //
    }

    public function store(StoreDiscussionRequest $storeDiscussionRequest)
    {
        $discussion = new Discussion();
        $discussion->user_id = $storeDiscussionRequest->user()->id;
        $discussion->topic_id = $storeDiscussionRequest->topic_id;
        $discussion->body = $storeDiscussionRequest->body;
        $discussion->save();

        return response()->json([
            'data' => new DiscussionResource($discussion)
        ],201);
    }

    public function show(Discussion $discussion)
    {
        //
    }

    public function update(Request $request, Discussion $discussion)
    {
        //
    }


    public function destroy(Discussion $discussion)
    {
        //
    }
}
