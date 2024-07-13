<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function pageMain()

    {
        $students = [
            "John" => 85,
            "Jane" => 92,
            "Dave" => 78,
            "Mary" => 90
        ];

        foreach ($students as $name => $score) {
            echo "Студент: $name, Оценка: $score<br/>";
        }
        return view('page.main');
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
}
