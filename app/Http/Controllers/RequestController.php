<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    public function record($id)
    {
        $userId = auth()->id();

        $pendingRequest = RequestModel::where('user_id', $userId)
            ->where('course_id', $id)
            ->where('status', 'pending')
            ->first();

        $acceptedRequest = RequestModel::where('user_id', $userId)
            ->where('course_id', $id)
            ->where('status', 'accepted')
            ->first();

        $rejectedRequest = RequestModel::where('user_id', $userId)
            ->where('course_id', $id)
            ->where('status', 'rejected')
            ->first();

        if ($pendingRequest) {
            return redirect()->back()->with('info', 'Ваша заявка в обработке.');
        }

        if ($acceptedRequest) {
            return redirect()->back()->with('info', 'Ваша записи одобрена.');
        }

        if ($rejectedRequest) {
            return redirect()->back()->with('info', 'Ваша заявка отклонена на этот курс.');
        }


        // Сохранение заявки
        $data = [
            'user_id' => $userId,
            'course_id' => $id,
        ];
        RequestModel::create($data);

        return redirect()->back()->with('success', 'Заявка успешно отправлена.');
    }

}
