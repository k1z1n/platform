@extends('includes.layout')
@section('h2-name', 'Добавить модуль')
@section('content')
    <h2 class="text-xl mb-6 ml-5 font-bold">Название</h2>
    <form action="{{ route('admin.store.module') }}" method="post">
        @csrf
        <input type="text" name="title" class="text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Комментарий..." />
        <h2 class="text-xl my-6 ml-5 font-bold">Комментарии</h2>
        <input type="text" name="comment" class="text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Комментарий..." />
    <h2 class="text-xl my-6 ml-5 font-bold">Теория</h2>
        <input type="text" name="theory" class="text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Теория..." />
    <h2 class="text-xl my-6 ml-5 font-bold">Задания для выполнения</h2>
        <input type="text" name="task" class="text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Задание..." />
        <div class="flex gap-5 my-6">
            <div class="flex flex-col w-full">
                <label for="countries" class="block ml-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Выбрать тип</label>
                <select name="stat" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Выбрать тип</option>
                    <option value="theory">теория</option>
                    <option value="practice">практика</option>

                </select>
            </div>
            <div class="flex flex-col w-full">
                <label for="countries" class="block ml-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Выбрать статус</label>
                <select name="status" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Выбрать статус</option>
                    <option value="necessarily">обязательно</option>
                    <option value="not necessary">не обязательно</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="course_id" value="{{ $id }}">
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Добавить</button>
    </form>
@endsection
