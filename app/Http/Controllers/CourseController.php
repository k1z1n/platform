<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\TaskService;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }
}
