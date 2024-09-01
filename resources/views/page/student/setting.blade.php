@extends('includes.layout')
@section('content')
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
                <input type="email" id="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="name@flowbite.com" required/>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Указывать корректно</p>
                <input type="submit"
                       class="bg-gray-900 mt-3 cursor-pointer text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                       value="Сменить">
            </form>
        </div>
    </div>
    <!-- Include Quill stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Include Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <div class="container">
        <h1>Создать Контент</h1>

        <!-- Форма создания контента -->
            <form id="quillForm" method="POST" action="{{ route('student.content.store') }}">
                @csrf
        <div id="editor">
        </div>
                <input type="hidden" id="quillContent" name="content">
                <button type="submit">Save</button>
            </form>

        <!-- Подключение скриптов Quill -->
{{--        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>--}}
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        // Основные форматирования
                        [{ 'font': [] }, { 'size': [] }],
                        ['bold', 'italic', 'underline', 'strike'], // жирный, курсив, подчеркнутый, зачеркнутый
                        [{ 'color': [] }, { 'background': [] }], // цвет текста, цвет фона
                        ['blockquote', 'code-block'], // цитата, код

                        // Форматирование текста
                        [{ 'header': 1 }, { 'header': 2 }, { 'header': 3 }, { 'header': 4 }], // заголовки
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }], // упорядоченный, маркированный список
                        [{ 'script': 'sub'}, { 'script': 'super' }], // подстрочный, надстрочный текст
                        [{ 'indent': '-1'}, { 'indent': '+1' }], // уменьшить/увеличить отступ
                        [{ 'direction': 'rtl' }], // направление текста

                        // Стили текста
                        [{ 'align': [] }], // выравнивание текста

                        // Вставка медиа и разделителей
                        ['link', 'image', 'video', 'formula'], // ссылка, изображение, видео, формула

                        // Управление и очистка
                        ['clean'] // очистить форматирование
                    ]
                }
            });
            document.getElementById('quillForm').addEventListener('submit', function(event) {
                event.preventDefault();
                var content = quill.root.innerHTML;
                document.getElementById('quillContent').value = content;
                this.submit();
            });
        </script>
    </div>

@endsection
