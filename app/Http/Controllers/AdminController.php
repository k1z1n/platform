<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function showMain()
    {
        return view('page.admin.main');
    }
    public function showGenerate()
    {
        return view('page.admin.generate');
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'required|max:255',
            'group' => 'required|max:255',
        ], [
            'username.required' => 'Имя обязательно для заполнения.',
            'surname.required' => 'Фамилия обязательна для заполнения.',
            'patronymic.required' => 'Отчество обязательно для заполнения.',
            'group.required' => 'Группа обязательна для заполнения.',
        ]);

        $baseLogin = collect(['username', 'surname', 'patronymic', 'group'])
            ->map(fn($field) => Str::slug(Str::substr($request->input($field), 0, 2)))
            ->implode('');

        $login = $baseLogin;
        $counter = 1;

        // Check if login already exists and increment until unique login is found
        while (User::where('login', $login)->exists()) {
            $login = $baseLogin . $counter;
            $counter++;
        }

        $password = Str::random(8);

        $role = 'student';
        if ($request->input('group')) {
            $role = 'admin';
        }

        User::create([
            'username' => $validatedData['username'],
            'surname' => $validatedData['surname'],
            'patronymic' => $validatedData['patronymic'],
            'login' => $login,
            'group' => $validatedData['group'],
            'password' => Hash::make($password),
            'pp' => $password,
            'role' => $role,
        ]);

        return redirect()->back()->with('success', 'Пользователь успешно создан');
    }


    public function showList(Request $request)
    {
        // Get search parameters
        $search = $request->input('search');
        $category = $request->input('category');

        // Query the users table
        $query = User::query();

        // Apply category filter (only if a category is selected)
        if ($category) {
            $query->where('group', $category);
        }

        // Apply search filter (only if a search query is provided)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%')
                    ->orWhere('patronymic', 'like', '%' . $search . '%');
            });
        }

        // Get the filtered results
        $list = $query->paginate(10);

        // Retrieve all unique groups from the database
        $groups = User::select('group')->distinct()->pluck('group');
        $count = $list->count();
        $allCount = User::all()->count();
        // Return the view with the filtered users and groups
        return view('page.admin.list', compact('list', 'groups', 'count', 'allCount'));
    }

}
