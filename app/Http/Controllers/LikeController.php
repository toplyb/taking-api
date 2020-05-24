<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
//        $user = $request->user();
//        if ($user->id == $request->likeable_user_id) {
//            return response()->json([
//                'data' => '您不能对自己的作品点赞'
//            ],401);
//        }

        Like::firstOrCreate([
            'user_id' => $request->user()->id,
            'likeable_type' => $request->likeable_type,
            'likeable_id' => $request->likeable_id
        ],[
            'user_id' => $request->user()->id,
            'likeable_type' => $request->likeable_type,
            'likeable_id' => $request->likeable_id
        ]);

        return response(null,204);
    }

    public function show(Like $like)
    {
        //
    }

    public function update(Request $request, Like $like)
    {
        //
    }

    public function destroy(Like $like)
    {
        //
    }
}
