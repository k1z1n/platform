@extends('includes.layout')
@section('content')
                <div class="flex gap-5">
                    <div class="w-full flex gap-5">
                        <div class="w-full bg-white rounded-xl px-4 pt-4 pb-3 flex flex-col gap-3">
                            Загрузить ответ за модуль
                            <form action="" method="post">

                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                (MAX. 800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden"/>
                                    </label>
                                </div>

                                <input type="submit"
                                       class="mt-6 cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                       value="Записаться на курс"></form>
                            {{--                            <form action=""><button disabled class="flex justify-start text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Выполнено на 50%</button></form>--}}
                        </div>
                    </div>
                </div>
                <h2 class="text-xl my-6 ml-5 font-bold">Комментарии</h2>
                <div class="rounded-xl bg-white p-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab asperiores commodi, deleniti esse fugit ipsum labore, maiores maxime minima non perferendis possimus, provident. Ab, error eum exercitationem quaerat sapiente tempora.
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
                                <img src="{{ asset('images/for.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <img src="{{ asset('images/примерfor.png') }}" alt="Image for For Loop"
                                     class="max-w-[48%] object-contain rounded-md">
                                <a href="{{ route('student.one.module') }}"
                                   class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Выполнить
                                    задание</a>
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, dolorum enim
                                    explicabo fugiat nihil nobis pariatur vel velit voluptatem voluptatibus? Blanditiis
                                    doloribus fuga mollitia nihil, recusandae rem sint totam voluptatem?
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
@endsection
