<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symphony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return response()->json([
            'success' => 'true',
            'message' => 'Blogs retrieved Successfully',
            'data' => $blogs
        ], 200);
    }
}

