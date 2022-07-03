<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        // $request->merge(['ip' => $request->getClientIp()]);
        // $post = Post::create($request->all());
        $post = new Post;
        $post->header = $request->header;
        $post->desc = $request->desc;
        $post->ip = $request->ip();
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json($post);
    }

    public function all()
    {
        return PostResource::collection(Post::all());
        return response()->json();
    }

    public function return($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json(['error' => true, 'massage' => 'No found']);
        }
        return response()->json($post);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json(['error' => true, 'massage' => 'No found']);
    }

    public function show()
    {
        $post = Post::query()->withAvg('grade', 'grades')
            ->orderByDesc('grade_avg_grades')->get();
        return response()->json($post);
    }

    public function ip()
    {
        $post = Post::query()->get()->groupBy('ip')->map->pluck('user_id');
        return response()->json($post);
    }


}
