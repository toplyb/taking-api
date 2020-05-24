<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Resources\TopicCollection;
use App\Http\Resources\TopicResource;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
        $this->authorizeResource(Topic::class, null, ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $topics = Topic::paginate(3);

        return new TopicCollection($topics);
    }

    public function store(StoreTopicRequest $storeTopicRequest)
    {
        $topic = Topic::create([
            'user_id' => $storeTopicRequest->user()->id,
            'content' => $storeTopicRequest->input('content'),
            'title' => $storeTopicRequest->title,
        ]);

        return response()->json([
            'data' => new TopicResource($topic)
        ], 201);
    }

    public function show(Topic $topic)
    {
        return response()->json([
            'data' => new TopicResource($topic)
        ], 200);
    }

    public function update(StoreTopicRequest $request, Topic $topic)
    {

        $topic->title = $request->title;
        $topic->content = $request->input('content');
        $topic->save();
        return response()->json([
            'data' => new TopicResource($topic)
        ]);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return response(null,204);
    }
}
