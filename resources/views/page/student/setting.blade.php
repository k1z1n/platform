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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Content</title>

        <!-- Подключение стилей Froala -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/css/froala_style.min.css" rel="stylesheet" type="text/css" />

        <!-- Подключение скриптов Froala -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/js/froala_editor.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>
    <body>
    <div class="container">
        <h1>Создать Контент</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Форма создания контента -->
        <form method="POST" action="{{ route('student.content.store') }}" enctype="multipart/form-data">
            @csrf
            <textarea id="editor" name="content"></textarea>
            <button type="submit">Сохранить</button>
        </form>

        <!-- Инициализация Froala Editor -->
        <script>
            $(function() {
                new FroalaEditor('#editor', {
                    toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertLink', 'insertImage', 'insertFile', 'insertVideo', 'undo', 'redo'],
                    pluginsEnabled: ['align', 'codeBeautifier', 'codeView', 'colors', 'draggable', 'embedly', 'emoticons', 'file', 'fontFamily', 'fontSize', 'fullscreen', 'image', 'imageManager', 'inlineStyle', 'lineBreaker', 'link', 'lists', 'paragraphFormat', 'paragraphStyle', 'quickInsert', 'quote', 'save', 'table', 'url', 'video', 'wordPaste'],
                    heightMin: 300,

                    // Настройки загрузки изображений
                    imageUploadURL: '{{ route('student.froala.upload') }}',  // URL для обработки загрузки изображений
                    imageUploadParams: {
                        _token: '{{ csrf_token() }}'  // Защита от CSRF в Laravel
                    },
                    imageInsertButtons: ['imageBack', '|', 'imageUpload', 'imageByURL'], // Добавляет кнопки загрузки и вставки изображений из URL
                    imageEditButtons: ['imageReplace', 'imageAlign', 'imageRemove', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', '-', 'imageDisplay', 'imageStyle', 'imageAlt', 'imageSize']
                });
            });
        </script>
    </div>
    </body>
    </html>


@endsection
