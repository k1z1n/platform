@extends('includes.layout')
@section('content')
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name">Платформа</div>
        </a>
        <ul class="side-menu">
            <li class="{{ request()->is('student') ? 'active' : '' }}">
                <a href="{{ route('student.main') }}">
                    <i class='bx bxs-dashboard'></i> Главная
                </a>
            </li>
            {{--            <li><a href="#"><i class='bx bx-store-alt'></i>Группы</a></li>--}}
            <li class="{{ request()->is('student/courses') ? 'active' : '' }}">
                <a href="{{ route('student.courses') }}">
                    <i class='bx bx-analyse'></i> Курсы
                </a>
            </li>
            {{--            <li><a href="#"><i class='bx bx-message-square-dots'></i>Запросы</a></li    >--}}
            {{--            <li><a href="#"><i class='bx bx-group'></i>Пользователи</a></li>--}}
            <li class="{{ request()->is('student/setting') ? 'active' : '' }}"><a href="{{ route('student.setting') }}"><i class='bx bx-cog'></i>Настройки</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Выход
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <h2 class="text-xl">Главная</h2>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="{{ asset('images/user.png') }}" alt="">
            </a>
        </nav>
        <main class="flex gap-4">
            <div class="w-3/4 gap-5">
                <div class="flex gap-5">
                    <div class="bg-white rounded-xl px-5 pt-5 pb-4 flex flex-col w-1/2">
                        <h2 class="text-xl mb-4">Сменить аватар</h2>
                        <div class="flex"></div>
                        <img src="{{ asset('images/user.png') }}" alt="" class="w-16 flex justify-center mb-4">
                        <form action="" method="post">
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                                or GIF (MAX. 800x400px).</p>
                            <input type="submit"
                                   class="bg-gray-900 mt-3 cursor-pointer text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                   value="Сменить">
                        </form>
                    </div>
                    <div class="bg-white rounded-xl px-5 pt-5 pb-4 flex flex-col w-1/2 justify-between">
                        <h2 class="text-xl mb-4">Сменить ник телеграм</h2>
                        <form action="" method="post">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ник</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Указывать корректно</p>
                            <input type="submit"
                                   class="bg-gray-900 mt-3 cursor-pointer text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                   value="Сменить">
                        </form>
                    </div>
                    <div class="bg-white rounded-xl px-5 pt-5 pb-4 flex flex-col w-1/2 justify-between">
                        <h2 class="text-xl mb-4">Сменить ник телеграм</h2>
                        <form action="" method="post">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ник</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Указывать корректно</p>
                            <input type="submit"
                                   class="bg-gray-900 mt-3 cursor-pointer text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                   value="Сменить">
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-1/4 gap-y-6 flex flex-col">
                <div class="flex rounded-xl bg-white flex-col p-6 items-center">
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-16 h-16 mb-4">
                    <h3 class="mb-2">Альберт Наумович</h3>
                    {{--                    <p class="mb-2">Ученик</p>--}}
                    <p><span class="text-[#677483]">Группа:</span> 427/2024</p>
                </div>
                <div class="flex rounded-xl bg-white flex-col gap-y-6 p-6 items-center">
                    <img src="{{ asset('images/spisok.png') }}" alt="" class="w-16">
                    <div class="grid w-full gap-3">
                        <a href="" class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">
                            <p class="text-[16px]"><span class="text-[16px] mb-1 text-[#677483]">Группа</span><br>427/2024
                            </p>
                        </a>
                        {{--                        <div class="flex justify-center shadow-md gap-2 bg-white rounded-xl text-center p-2">--}}
                        {{--                            <a href="" class="text-md"><p class="text-[14px] mb-1">Группа</p>437/10</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

        sideLinks.forEach(item => {
            const li = item.parentElement;
            item.addEventListener('click', () => {
                sideLinks.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });

        const menuBar = document.querySelector('.content nav .bx.bx-menu');
        const sideBar = document.querySelector('.sidebar');

        menuBar.addEventListener('click', () => {
            sideBar.classList.toggle('close');
        });

        const searchBtn = document.querySelector('.content nav form .form-input button');
        const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
        const searchForm = document.querySelector('.content nav form');

        searchBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 576) {
                e.preventDefault;
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
    </script>
@endsection
