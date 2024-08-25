@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')
                <div class="grid grid-cols-3 gap-5">
                    <a href="" class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center h-full">
                        {{--                        php--}}
                        <img src="{{ asset('images/php.png') }}" alt="" class="object-cover h-full max-h-36">
                        <h4 class="text-md">PHP</h4>
                    </a>
                    <a href="" class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center">
                        <img src="{{ asset('images/html.png') }}" alt="" class="h-full max-h-36">
                        <h4 class="text-md">html+css</h4>
                    </a>
                    <a href="" class="bg-white rounded-xl p-3 flex flex-col items-center gap-3 justify-center h-full">
                        {{--                        php--}}
                        <img src="{{ asset('images/php.png') }}" alt="" class="object-cover h-full max-h-36">
                        <h4 class="text-md">PHP</h4>
                    </a>
                </div>
                <h3 class="mb-3 text-lg mt-5 ml-2 font-bold">История выполнения</h3>
                <div class="bg-gray-100 flex flex-col gap-5 rounded-xl">
                    <div class="flex flex-col">
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-t-lg">
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Курс</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Модуль</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700">Статус</div>
                            <div class="flex justify-center items-center py-2 font-semibold text-gray-700"></div>
                        </div>
                        <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">PHP</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Цикл while</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Не выполнено</div>
                            <div
                                class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">
                                Выполнить
                            </div>
                        </div>
                        <hr class="border-gray-300">
                                                <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">PHP</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Цикл while</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Не выполнено</div>
                            <div
                                class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">
                                Выполнить
                            </div>
                        </div>
                        <hr class="border-gray-300">
                                                <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">PHP</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Цикл while</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Не выполнено</div>
                            <div
                                class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">
                                Выполнить
                            </div>
                        </div>
                        <hr class="border-gray-300">
                                                <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">PHP</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Цикл while</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Не выполнено</div>
                            <div
                                class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">
                                Выполнить
                            </div>
                        </div>
                        <hr class="border-gray-300">
                                                <div class="grid grid-cols-[minmax(0,1fr)_2fr_2fr_2fr] bg-white p-2 rounded-b-lg">
                            <div class="flex justify-center items-center py-2 text-[#677483]">PHP</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Цикл while</div>
                            <div class="flex justify-center items-center py-2 text-[#677483]">Не выполнено</div>
                            <div
                                class="flex justify-center hover:bg-blue-500 px-4 py-2 rounded-xl transition duration-700 ease-in-out items-center hover:text-white text-blue-500 cursor-pointer">
                                Выполнить
                            </div>
                        </div>
                    </div>
                </div>
@endsection
