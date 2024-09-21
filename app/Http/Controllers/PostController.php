<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::paginate(10);
    }

    public function createPost(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'title' => 'required|string|min:3', // corrected the min validation rule
            'content' => 'required|string|max:5000',
            'user_id' => 'required|exists:users,id' // corrected the exists rule
        ]);

        return Post::create($data);
    
    }

}
