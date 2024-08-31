<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function markCompletion(Request $request, $id){
        $userId = $request->user()->id;
        Task::create(['user_id' => $userId, 'module_id' => $id]);
        return redirect()->back()->with('info', 'Отправлено на проверку');
    }

    public function markFailed($id)
    {

    }
}
