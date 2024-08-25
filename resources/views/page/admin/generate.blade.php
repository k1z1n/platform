@extends('includes.layout')
@section('h2-name', 'Генерация пользователя')
@section('content')
                <div>
                    <form class="max-w-sm mx-auto bg-white p-5 rounded-lg shadow-md" method="post" action="{{ route('admin.generate.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
                            <input type="text" id="username" value="{{ old('username') }}" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Иванов"/>
                            @error('username')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                            <input type="text" id="surname" value="{{ old('surname') }}" name="surname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Иван"/>
                            @error('surname')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="patronymic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
                            <input type="text" id="patronymic" value="{{ old('patronymic') }}" name="patronymic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Иванович"/>
                            @error('patronymic')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер группы</label>
                            <input type="text" id="group" value="{{ old('group') }}" name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="427"/>
                            @error('group')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-gra focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Генерация</button>
                    </form>
                </div>
@endsection
