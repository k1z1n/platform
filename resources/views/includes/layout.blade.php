<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('icons/infinity_3Hl_icon.ico') }}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
@adminArea
<div class="sidebar">
    <a href="{{ route('admin.main') }}" class="logo">
        <img src="{{ asset('icons/infinity.png') }}" alt="" class="w-10 ml-3 mr-2">
        <div class="logo-name gradient">платформа</div>
    </a>
    <ul class="side-menu">
        <li class="{{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.main') }}">
                <i class='bx bxs-dashboard'></i> Главная
            </a>
        </li>
        <li class="{{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : '' }}">
            <a href="{{ route('admin.courses') }}">
                <i class='bx bx-analyse'></i> Курсы
            </a>
        </li>
        <li class="{{ request()->is('admin/requests') || request()->is('admin/requests/*') ? 'active' : '' }}">
            <a href="{{ route('admin.requests') }}">
                <i class='bx bx-analyse'></i> Запросы
            </a>
        </li>
        <li class="{{ request()->is('admin/generate') ? 'active' : '' }}">
            <a href="{{ route('admin.generate') }}">
                <i class='bx bx-plus-circle'></i> Генерация
            </a>
        </li>
        <li class="{{ request()->is('admin/add/course') ? 'active' : '' }}">
            <a href="{{ route('admin.add.course') }}">
                <i class='bx bx-plus'></i> Добавить курс
            </a>
        </li>
        <li class="{{ request()->is('admin/add/group') ? 'active' : '' }}">
            <a href="{{ route('admin.add.group') }}">
                <i class='bx bx-plus'></i> Добавить группа
            </a>
        </li>
        <li class="{{ request()->is('admin/list') ? 'active' : '' }}">
            <a href="{{ route('admin.list') }}">
                <i class='bx bx-group'></i> Пользователи
            </a>
        </li>
        <li class="{{ request()->is('admin/visits') ? 'active' : '' }}">
            <a href="{{ route('admin.list') }}">
                <i class='bx bx-list-ol'></i> Списки
            </a>
        </li>
        <li class="{{ request()->is('student/setting') ? 'active' : '' }}">
            <a href="{{ route('student.setting') }}">
                <i class='bx bx-cog'></i> Настройки
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <div class="logout">
                <form action="{{ route('logout') }}" method="post" style="display: flex; align-items: center;">
                    @csrf
                    <button type="submit" style="display: flex; align-items: center; border: none; background: none; cursor: pointer;">
                        <i class='bx bx-log-out-circle'></i>
                        Выход
                    </button>
                </form>
            </div>
        </li>
    </ul>
</div>
@endadminArea
@studentArea
<div class="sidebar">
    <a href="{{ route('student.main') }}" class="logo">
        <img src="{{ asset('icons/infinity.png') }}" alt="" class="w-10 ml-3 mr-2">
        <div class="logo-name gradient">платформа</div>
    </a>
    <ul class="side-menu">
        <li class="{{ request()->is('student') ? 'active' : '' }}">
            <a href="{{ route('student.main') }}">
                <i class='bx bxs-dashboard'></i> Главная
            </a>
        </li>
        <li class="{{ request()->is('student/courses')|| request()->is('student/courses/*') ? 'active' : '' }}">
            <a href="{{ route('student.courses') }}">
                <i class='bx bx-analyse'></i> Курсы
            </a>
        </li>
        <li class="{{ request()->is('student/content/list') ? 'active' : '' }}">
            <a href="{{ route('student.student.list') }}">
                <i class='bx bx-list-ol'></i> Списки
            </a>
        </li>
        <li class="{{ request()->is('student/setting') ? 'active' : '' }}">
            <a href="{{ route('student.setting') }}">
                <i class='bx bx-cog'></i> Настройки
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <div class="logout">
                <form action="{{ route('logout') }}" method="post" style="display: flex; align-items: center;">
                    @csrf
                    <button type="submit" style="display: flex; align-items: center; border: none; background: none; cursor: pointer;">
                        <i class='bx bx-log-out-circle'></i>
                        Выход
                    </button>
                </form>
            </div>
        </li>
    </ul>
</div>
@endstudentArea
<div class="content">
    @auth()
        <nav class="navi">
            <i class='bx bx-menu'></i>
            <form action="#">
                <h2 class="text-xl">@yield('h2-name')</h2>
            </form>
            <a href="#" class="profile">
                <img src="{{ asset('images/user.png') }}" alt="">
            </a>
        </nav>
    @endauth
    <main class="flex gap-5">
        <div class="w-3/4 gap-5">
            @include('includes.message')
            @yield('content')
        </div>
        @adminArea
        <div class="w-1/4 gap-y-5 flex flex-col">
            <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                <h3 class="mb-2">{{ auth()->user()->username }} {{ auth()->user()->patronymic }}</h3>
                    <p><span class="text-[#677483]">Администратор</span></p>
            </div>
        </div>
        @endadminArea
        @studentArea
        <div class="w-1/4 gap-y-5 flex flex-col">
            <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                <h3 class="mb-2">{{ auth()->user()->username }} {{ auth()->user()->patronymic }}</h3>
                <p><span class="text-[#677483]">Студент группы: </span>{{ auth()->user()->group->title }}</p>
            </div>
            <div class="flex rounded-xl bg-white shadow-lg flex-col gap-y-6 p-6 items-center">
{{--                <h3 class="text-xl font-bold text-gray-800">Данные личного домена</h3>--}}
                <div class="w-full">
                    <p class="text-md">Подключение для FileZilla</p>
                    <div class="mt-2">
                        <p class=""><span class="text-[#677483]">Хост: </span>{{ $fileZilla->host }}</p>
                        <p class=""><span class="text-[#677483]">Имя пользователя: </span>{{ $fileZilla->username  }}</p>
                        <p class=""><span class="text-[#677483]">Пароль: </span>{{ $fileZilla->password }}</p>
                    </div>
                </div>
                <div class="w-full">
                    <p class="text-md">Подключение для phpMyAdmin</p>
                    <div class="mt-2">
                        <p class=""><span class="text-[#677483]"></span><a href="https://loki.beget.com/phpMyAdmin/index.php">Ссылка</a></p>
                        <p class=""><span class="text-[#677483]">Имя пользователя: </span>{{ $database->username }}</p>
                        <p class=""><span class="text-[#677483]">Пароль: </span>{{ $database->password }}</p>
                    </div>
                </div>
                <div class="w-full">
                    <p class="text-md">Данные для платформы</p>
                    <div class="mt-2">
                        <p class=""><span class="text-[#677483]">Логин: </span>{{ auth()->user()->username }}</p>
                        <p class=""><span class="text-[#677483]">Пароль: </span>{{ auth()->user()->pp }}</p>
                    </div>
                </div>
            </div>
            <div class="flex rounded-xl bg-white flex-col gap-y-6 p-6 items-center">
                <img src="{{ asset('images/spisok.png') }}" alt="" class="w-16">
                <div class="grid w-full gap-3">
                    <a href="{{ auth()->user()->group->link }}" class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">
                        <p class="text-[16px]"><span class="text-[16px] mb-1 text-[#677483]">Группа</span><br>427/2024
                        </p>
                    </a>
                </div>
            </div>
        </div>
        @endstudentArea
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');
        const menuBar = document.querySelector('.content nav .bx.bx-menu');
        const sideBar = document.querySelector('.sidebar');

        // Проверка состояния меню при загрузке страницы
        if (localStorage.getItem('sidebarClosed') === 'true') {
            sideBar.classList.add('close');
        }

        // Добавление события клика для открытия/закрытия меню
        menuBar.addEventListener('click', () => {
            sideBar.classList.toggle('close');
            // Сохранение состояния меню в localStorage
            localStorage.setItem('sidebarClosed', sideBar.classList.contains('close'));
        });

        sideLinks.forEach(item => {
            const li = item.parentElement;
            item.addEventListener('click', () => {
                sideLinks.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });

        const searchBtn = document.querySelector('.content nav form .form-input button');
        const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
        const searchForm = document.querySelector('.content nav form');

        searchBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchBtnIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchBtnIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth < 768) {
                sideBar.classList.add('close');
            } else {
                sideBar.classList.remove('close');
            }
            if (window.innerWidth > 576) {
                searchBtnIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        });

        const toggler = document.getElementById('theme-toggle');

        toggler.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });
    });
</script>
</body>
</html>
