<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showMain()
    {
        return view('page.student.main');
    }
    public function showSettings(){
        return view('page.student.settings');
    }

    public function showCourses()
    {
        $courses = Course::all();
        return view('page.student.courses', compact('courses'));
    }

    public function showSetting()
    {
        return view('page.student.setting');
    }

    public function showOneCourse($id)
    {
        $course = Course::findOrFail($id);
        $userId = auth()->id();
        $request = RequestModel::where('user_id', $userId)->where('course_id', $course->id)->first();
        return view('page.student.one-course', compact('course', 'request'));
    }

    public function showOneModule($id)
    {
        $module = Module::findOrFail($id);
        return view('page.student.one-module', compact('module'));
    }
}
