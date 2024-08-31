@extends('includes.layout')
@section('h2-name', 'Модуль')
@section('content')
                <h2 class="text-xl mb-6 ml-5 font-bold">Комментарии</h2>
                <div class="rounded-xl bg-white p-6">
                    {{ $module->comment }}
                </div>
                <h2 class="text-xl my-6 ml-5 font-bold">Теория</h2>
                <div class="bg-white rounded-xl">
                    <div id="accordion-collapse-descriptions" data-accordion="collapse" class="mb-10">
                        <!-- for loop -->
                        <h2 id="accordion-collapse-heading-for-description">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-for-description"
                                    aria-expanded="false"
                                    aria-controls="accordion-collapse-body-for-description">
                                <span>Цикл for</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-for-description" class="hidden"
                             aria-labelledby="accordion-collapse-heading-for-description">
                            <div
                                class="p-5 max-w-full gap-5 border border-t-0 border-gray-200 dark:border-gray-700 flex flex-wrap">
                                {{ $module->theory }}
                            </div>

                        </div>
                    </div>
                </div>
                <h2 class="text-xl my-6 ml-5 font-bold">Задания для выполнения</h2>
                <div class="bg-white rounded-xl">
                    <div class="bg-white rounded-xl">
                        <div id="accordion-collapse-otvet" data-accordion="collapse" class="mb-10">
                            <!-- for loop -->
                            <h2 id="accordion-collapse-heading-for-otvet">
                                <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-for-otvet"
                                        aria-expanded="false"
                                        aria-controls="accordion-collapse-body-for-otvet">
                                    <span>Цикл for</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-for-otvet" class="hidden"
                                 aria-labelledby="accordion-collapse-heading-for-otvet">
                                <div
                                    class="p-5 max-w-full gap-5 border border-t-0 border-gray-200 dark:border-gray-700 flex flex-wrap">
                                    {{ $module->task }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <a href=""
                   class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Отметить выполнение</a>
@endsection
