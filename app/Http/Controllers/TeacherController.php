<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function showMain()
    {
        return view('page.teacher.main');
    }
    public function showSetting(){
        return view('page.teacher.settings');
    }

    public function showGroups()
    {
        return view('page.teacher.groups');
    }

    public function showOneGroup()
    {
        return view('page.teacher.one-group');
    }

    public function showRequest()
    {
        return view('page.teacher.request');
    }

}
