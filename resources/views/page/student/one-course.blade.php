@extends('includes.layout')
@section('content')
                <div class="flex gap-5">
                    <div class="w-full flex gap-5">
                        <div class="w-1/4 bg-white rounded-xl flex flex-col items-center p-4 gap-3">
                            <img src="{{ asset('images/php.png') }}" alt="" class="h-full max-h-36 object-cover">
                            <h4 class="text-md">PHP</h4>
                        </div>
                        <div class="w-3/4 bg-white rounded-xl px-4 pt-4 pb-3 flex flex-col gap-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque delectus dolorem et ipsum
                            nemo nesciunt odit. Aperiam consectetur, consequuntur, cupiditate dolorem illum, incidunt
                            ipsam magnam nulla quibusdam ratione saepe veritatis?
                            <form action="" method="post"><input type="submit"
                                                                 class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                                                 value="Записаться на курс"></form>
{{--                            <form action=""><button disabled class="flex justify-start text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Выполнено на 50%</button></form>--}}
                        </div>
                    </div>
                </div>
                <h2 class="text-xl my-6 ml-5 font-bold">Задания для выполнения</h2>
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
                                <img src="{{ asset('images/for.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/примерfor.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <a href="{{ route('student.one.module') }}" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Выполнить задание</a>
                            </div>

                        </div>


                        <!-- while loop -->
                        <h2 id="accordion-collapse-heading-while">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-while" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-while">
                                <span>Цикл while</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-while" class="hidden"
                             aria-labelledby="accordion-collapse-heading-while">
                            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <img src="{{ asset('images/while.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/примерwhile.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                            </div>
                        </div>

                        <!-- do..while loop -->
                        <h2 id="accordion-collapse-heading-do-while">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-do-while" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-do-while">
                                <span>Цикл do..while</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-do-while" class="hidden"
                             aria-labelledby="accordion-collapse-heading-do-while">
                            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <img src="{{ asset('images/dowhile.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/примерdowhile.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                            </div>
                        </div>

                        <!-- foreach loop -->
                        <h2 id="accordion-collapse-heading-foreach">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-foreach" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-foreach">
                                <span>Цикл foreach</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-foreach" class="hidden"
                             aria-labelledby="accordion-collapse-heading-foreach">
                            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <img src="{{ asset('images/foreach.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/примерforeach.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                            </div>
                        </div>
                        <h2 id="accordion-collapse-heading-break">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-break" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-break">
                                <span>Break</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-break" class="hidden"
                             aria-labelledby="accordion-collapse-heading-break">
                            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <img src="{{ asset('images/break1.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/break2.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                            </div>
                        </div>
                        <h2 id="accordion-collapse-heading-continue">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-continue" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-continue">
                                <span>Continue</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-continue" class="hidden mb-10"
                             aria-labelledby="accordion-collapse-heading-continue">
                            <div class="p-5 flex gap-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <img src="{{ asset('images/continue1.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/continue2.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                            </div>
                        </div>
                    </div>
                </div>
@endsection
