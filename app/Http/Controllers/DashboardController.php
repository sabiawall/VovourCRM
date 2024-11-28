<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all blogs and count
        $blogs = Blog::latest()->get();
        $totalBlogs = $blogs->count();

        return view('backend.dashboard', compact('blogs', 'totalBlogs'));
    }

    public function viewBlog($id)
    {
        // Fetch single blog by ID
        $blog = Blog::findOrFail($id);

        return view('backend.blog.view', compact('blog'));
    }
}
