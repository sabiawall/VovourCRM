<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Scholarship;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $blogCount = Blog::count();
        $scholarshipCount = Scholarship::count();
        $userCount = User::count();

        return view('backend.dashboard', compact('blogCount', 'scholarshipCount', 'userCount'));
    }
}
