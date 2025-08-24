<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// URLのパラメータを受け取り、計算処理を行うルート
Route::get('/calcs/{val1}/{operator}/{val2}', function ($val1, $operator, $val2) {

    $result = 0;
    $symbol = '';
    $error = '';

    // URLから渡された値が数値かチェック
    if (!is_numeric($val1) || !is_numeric($val2)) {
        $error = 'URLの「値」には、数値を指定してください。';
    } else {
        // 演算子の文字列に応じて計算を分岐
        switch ($operator) {
            case 'addition':
                $result = $val1 + $val2;
                $symbol = '+';
                break;
            case 'subtraction':
                $result = $val1 - $val2;
                $symbol = '-';
                break;
            case 'multiplication':
                $result = $val1 * $val2;
                $symbol = '×';
                break;
            case 'division':
                // 0での割り算を防ぐ
                if ($val2 == 0) {
                    $error = '0で割ることはできません。';
                } else {
                    $result = $val1 / $val2;
                    $symbol = '÷';
                }
                break;
            default:
                $error = '演算子が正しくありません。(addition, subtraction, multiplication, division)';
        }
    }

    // 計算結果やエラーメッセージをビューに渡す
    return view('calculation', [
        'val1' => $val1,
        'val2' => $val2,
        'symbol' => $symbol,
        'result' => $result,
        'error' => $error,
    ]);
});
