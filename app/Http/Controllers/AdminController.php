<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Database;
use App\Models\FileZilla;
use App\Models\Group;
use App\Models\Request as RequestModel;
use App\Models\Module;
use App\Models\Subdomain;
use App\Models\User;
use App\Services\BegetAPIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected BegetAPIService $begetApiService;

    public function __construct(BegetAPIService $begetApiService)
    {
        $this->begetApiService = $begetApiService;
    }

    public function showMain()
    {
        return view('page.admin.main');
    }
    public function showGenerate()
    {
        $groups = Group::all();
        return view('page.admin.generate', compact('groups'));
    }

    public function createUser(Request $request)
    {
        // Создаем объект валидатора для валидации данных пользователя
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'required|max:255',
            'group_id' => 'required',
        ], [
            'username.required' => 'Имя обязательно для заполнения.',
            'surname.required' => 'Фамилия обязательна для заполнения.',
            'patronymic.required' => 'Отчество обязательно для заполнения.',
            'group_id.required' => 'Группа обязательна для заполнения.',
            'group_id.numeric' => 'Группа должна быть числом.',
        ]);

        // Проверяем, есть ли ошибки валидации
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Ошибка валидации')->withErrors($validator)->withInput();
        }

        // Получаем валидированные данные
        $validatedData = $validator->validated();

        // Генерация уникального логина
        $baseLogin = collect(['username', 'patronymic'])
            ->map(fn($field) => Str::slug(Str::substr($request->input($field), 0, 2)))
            ->implode('');

        $login = $baseLogin;
        $counter = 1;

        while (User::where('login', $login)->exists()) {
            $login = $baseLogin . $counter;
            $counter++;
        }

        // Генерация пароля
        $password = Str::random(8);

        // Определение роли пользователя
        $groupId = $request->input('group_id');
        $groupName = Group::findOrFail($groupId)->title;
        $role =  $groupName === 'Администратор' ? 'admin' : 'student';
        // Создание нового пользователя
        $user = User::create([
            'username' => $validatedData['username'],
            'surname' => $validatedData['surname'],
            'patronymic' => $validatedData['patronymic'],
            'login' => $login,
            'group_id' => $groupId,
            'password' => Hash::make($password),
            'pp' => $password,
            'role' => $role,
        ]);

        // Создание домена и получение необходимых данных для добавления в таблицы
        $createDomain = $this->begetApiService->createSiteAndRetrieveIds($login);

        // Проверка успешности создания домена и добавление данных в таблицы
        if ($createDomain['status'] === 'success') {
            // Добавление данных в таблицу file_zillas
            FileZilla::create([
                'host' => 'k1z1nksb.beget.tech',
                'username' => $createDomain['ftPLogin'],
                'password' => $createDomain['ftPPassword'],
                'user_id' => $user->id,
            ]);

            // Добавление данных в таблицу subdomains
            Subdomain::create([
                'title' => $createDomain['link'],
                'user_id' => $user->id,
            ]);

            // Добавление данных в таблицу databases
            Database::create([
                'username' => $createDomain['dbLogin'],
                'password' => $createDomain['dbPassword'],
                'user_id' => $user->id,
            ]);
        } else {
            return redirect()->back()->with('error', 'Ошибка при создании сайта и поддомена.');
        }

        return redirect()->back()->with('success', 'Пользователь успешно создан');
    }




    public function showList(Request $request)
    {
        // Получаем параметры поиска
        $search = $request->input('search');
        $category = $request->input('category');

        // Запрос к таблице пользователей
        $query = User::query();

        // Применяем фильтр по категории (если категория выбрана)
        if ($category) {
            $query->whereHas('group', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        // Применяем фильтр поиска (если задан поисковый запрос)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%')
                    ->orWhere('patronymic', 'like', '%' . $search . '%');
            });
        }

        // Получаем отфильтрованные результаты
        $list = $query->paginate(10);

        // Извлекаем все уникальные группы из базы данных
        $groups = Group::all(); // Извлечение всех групп, чтобы использовать их в выпадающем списке
        $count = $list->count();
        $allCount = User::count();

        // Возвращаем представление с отфильтрованными пользователями и группами
        return view('page.admin.list', compact('list', 'groups', 'count', 'allCount'));
    }


    public function showCourses()
    {
        $courses = Course::all();
        return view('page.admin.courses', compact('courses'));
    }

    public function showOneCourse($id)
    {
        $course = Course::findOrFail($id);
        $modules = $course->modules;
        return view('page.admin.course', compact('course', 'modules'));
    }

    public function showAddCourse()
    {
        return view('page.admin.add-course');
    }

    public function storeCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Ошибка валидации')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('courses/logos', 'public');
            $data = $validator->validated();
            $data['logo'] = $logoPath;
        } else {
            return redirect()->back()->with('error', 'Ошибка загрузки файла')->withInput();
        }

        Course::create($data);

        return redirect()->route('admin.courses')->with('success', 'Курс успешно добавлен');
    }

    public function showAddGroup()
    {
        return view('page.admin.add-group');
    }

    public function storeGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Ошибка валидации')->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        Group::create($data);

        return redirect()->route('admin.groups')->with('success', 'Курс успешно добавлен');
    }

    public function deleteGroup($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('page.admin.groups')->with('success', 'Группы успешно удалена');
    }

    public function updateGroup(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Ошибка валидации')->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        $group->update($data);

        return redirect()->route('admin.groups')->with('success', 'Курс успешно обновлен');
    }

    public function showGroups()
    {
        $groups = Group::all();
        return view('page.admin.groups', compact('groups'));
    }

    public function showAddModule($id)
    {
        return view('page.admin.add-module', compact('id'));
    }

    public function storeModule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'comment' => 'nullable|max:255',
            'theory' => 'required|max:255',
            'task' => 'required|max:255',
            'stat' => 'required|in:theory,practice',
            'status' => 'required|in:necessarily,not necessary',
            'course_id' => 'required|exists:courses,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Ошибка валидации')->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        Module::create($data);

        $courseId = $data['course_id'];

        return redirect()->route('admin.show.course', $courseId)->with('success', 'Модуль успешно добавлен');
    }

    public function destroyModule($id){
        $module = Module::findOrFail($id);
        $courseId = $module->course;
        $module->delete();
        return redirect()->route('admin.show.course', $courseId)->with('success', 'Модель успешно удален');
    }

    public function showRequests()
    {
        $requests = RequestModel::orderByRaw("status = 'pending' desc")->orderBy('status', 'asc')->paginate(10);
        return view('page.admin.requests', compact('requests'));
    }
    public function updateRequest(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        // Найти заявку по ID
        $requestModel = RequestModel::findOrFail($id);

        // Обновить статус заявки
        $requestModel->status = $validatedData['status'];
        $requestModel->save();

        return redirect()->back()->with('success', 'Статус заявки успешно обновлен.');
    }
}
