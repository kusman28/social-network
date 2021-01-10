<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

class PostController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $posts = $post->whereIn('user_id', $request->user()->following()
                        ->pluck('users.id')
                        ->push($request->user()->id))
                        ->with('user')
                        ->with('likes')
                        ->orderBy('created_at', 'asc')
                        ->take($request->get('limit', 30))
                        ->get();
        return response()->json($posts);
    }

    public function show(Post $slug)
    {
        return view('post.single-post', ['post' => $slug]);
        // $slug = Post::with('likes')->get();
        // return response()->json($slug);
    }

    // public function totalLike()
    // {
    //     $slug = Post::with('likes')->get();
    //     return response()->json($slug);
    // }

    public function store(Request $request, Post $post)
    {   
        $this->validate($request, [
            'body' => 'required|string',
        ]);
        
        $newPost = $request->user()->posts()->create([
            'body' => $request->body,
            'slug' => $request->user()->student_no .'-'. \Str::random(8),
        ]);
   
        return response()->json($post->with('user')->find($newPost->id));
    }

    public function getlike(Request $request)
    {
        $post = Post::find($request->post);

        return response()->json([
            'post' => $post,
        ]);
    }
 
    public function like(Request $request)
    {
        $likeCheck = Like::where(['user_id' => \Auth::id(), 'post_id' => $request->id])->first();

        if ($likeCheck) {

            $post = Post::find($request->post);
            $value = $post->like;
            $post->like = $value-1;
            $post->save();

            Like::where(['user_id' => \Auth::id(), 'post_id' => $request->id])->delete();
            return 'unliked';

        } else {

            $post = Post::find($request->post);
            $value = $post->like;
            $post->like = $value+1;
            $post->save();

            $like = new Like;
            $like->user_id = \Auth::id();
            $like->post_id = $request->id;
            $like->save();

        }


        // return response()->json([
        //     'message' => 'Liked!',
        // ]);
    }    

    public function unlike(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->like;
        $post->like = $value-1;
        $post->save();

        return response()->json([
            'message' => 'Liked!',
        ]);
    }    
 
    public function getDislike(Request $request)
    {
        $post = Post::find($request->post);

        return response()->json([
            'post' => $post,
        ]);
    }
 
    public function dislike(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->dislike;
        $post->dislike = $value+1;
        $post->save();

        return response()->json([
            'message' => 'Disliked!',
        ]);
    }
}
