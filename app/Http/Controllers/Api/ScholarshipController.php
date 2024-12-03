<?php

namespace App\Http\Controllers\API;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        return response()->json([
            'success' => 'true',
            'message' => 'Scholarships retrieved Successfully',
            'data' => $scholarships
        ], 200);
    }
}

