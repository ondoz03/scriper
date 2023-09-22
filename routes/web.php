<?php

use App\Http\Controllers\createTesting;
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


Route::get('/data', function () {
    $userfile = file_get_contents("../app/Console/Commands/datascript/aac.txt");

    // Place each line of $userfile into array
    $users = explode("JSON.parse", $userfile);
    $data = json_encode($users[1], true);
    $map = json_decode($data);

    $start = strpos($map, '(') + 1;
    $end = strpos($map, ');', $start);
    $datas = substr($map, $start, $end - $start);
    // $datas = json_decode($map, true);
    $data1 = json_decode($datas);

    echo '<pre>';
    return $data1;
    echo '</pre>';
});

Route::get('/testing', [createTesting::class, 'index']);
