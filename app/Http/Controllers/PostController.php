<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
//        return response()->json([
//            'data' => $posts
//        ]);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $validatedData = $request->validated(); // Retrieve the validated data.

        $created = Post::create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body']
        ]);

        // Return a JSON response with the created data and a 201 status code (Created).
        return response()->json(['data' => $created], 201);

//        $validator = Validator::make($request->all(),[
//            'title' => 'required',
//            'body' => 'required',
//        ]);
//
//        if($validator->fails()){
//            return response()->json($validator->messages(),422);
//        }
//        $created = Post::create([
//            'title' => $request->title,
//            'body' => $request->body
//        ]);



//        return response()->json(['data' => $created],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if (empty($post)) return response()->json(['message' => 'not found'],404);
        return response()->json(['data' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validatedData = $request->validated();
        $updated = $post->update([
            'title' => $validatedData['title'],
            'body' => $validatedData['body']
        ]);
        return response()->json(['data' => $updated]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
