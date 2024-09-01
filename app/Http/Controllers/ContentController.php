<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function create()
    {
        return view('content.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'content' => 'required',
        ]);

        // Извлекаем все URL изображений из контента
        preg_match_all('/<img[^>]+src="([^">]+)"/', $validated['content'], $matches);

        // Путь для хранения изображений
        $storagePath = 'uploads';

        foreach ($matches[1] as $tempImagePath) {
            $tempImagePath = str_replace('/storage/', '', $tempImagePath); // Убираем начальную часть пути
            $fileName = basename($tempImagePath); // Получаем имя файла
            $newPath = $storagePath . '/' . $fileName; // Новое место хранения

            // Перемещаем файл в постоянную папку
            if (Storage::disk('public')->exists($tempImagePath)) {
                Storage::disk('public')->move($tempImagePath, $newPath);
            }

            // Обновляем пути в контенте
            $validated['content'] = str_replace('/storage/' . $tempImagePath, '/storage/' . $newPath, $validated['content']);
        }

        // Сохранение контента в базу данных
        Content::create([
            'mixed_content' => $validated['content']
        ]);

        return redirect()->route('student.student.list')->with('success', 'Контент сохранен успешно!');
    }

    public function uploadImage(Request $request)
    {
        // Проверка наличия файла в запросе
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Опционально, добавить валидацию изображения
            $validatedData = $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Сохранение изображения во временную директорию storage
            $path = $file->storeAs('temp', 'public');  // Сохраняем во временную папку

            // Возврат URL сохраненного изображения для вставки в редактор
            return response()->json(['link' => Storage::url($path)]);
        }

        return response()->json(['error' => 'Ошибка загрузки изображения'], 400);
    }

    public function list(){
        $lists = Content::all();
        return view('page.student.list', compact('lists'));
    }
}
