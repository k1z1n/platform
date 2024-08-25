<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MainController extends Controller
{

    public function getCode()
    {
        $path = public_path('storage/app/code.txt');
        if (File::exists($path)) {
            $content = File::get($path);
            return Response::make($content, 200, [
                'Content-Type' => 'text/plain'
            ]);
        } else {
            return response('File not found', 404);
        }
    }

    public function executePhp(Request $request)
    {
        $code = $request->input('code'); // Получаем PHP код из тела POST запроса
        ob_start();
        eval('?>' . $code); // Выполняем PHP код и буферизуем вывод
        $output = ob_get_clean();
        return response()->json(['output' => $output]);
    }

    public function testPage()
    {
        return view('page.test');
    }

    public function pageMain()
    {
        return view('page.main');
    }

    public function pageTrainingSystem()
    {
        return view('page.student');
    }

    public function pageCycle()
    {
        return view('page.cycle');
    }

    public function pageTest()
    {
        echo '<table border="1">';
        for ($tr=1; $tr <= 10 ; $tr++ ) {
            echo '<tr>';
            for ($td=1; $td <= 10; $td++) {
                echo '<td>'.$tr * $td.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        return view('page.test');
    }

    public function pageGet()
    {
        return view('page.get');
    }

    public function pageStudy()
    {
        return view('page.study');
    }
}
