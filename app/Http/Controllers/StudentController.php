<?php

namespace App\Http\Controllers;

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
        return view('page.student.courses');
    }

    public function showSetting()
    {
        return view('page.student.setting');
    }

    public function showOneCourse()
    {
        return view('page.student.one-course');
    }

    public function showOneModule()
    {
        return view('page.student.one-module');
    }
}
