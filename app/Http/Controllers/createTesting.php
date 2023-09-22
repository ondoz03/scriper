<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class createTesting extends Controller
{
    public function index()
    {
        $userfile = file_get_contents("../app/Console/Commands/datascript/aac.txt");

        // Place each line of $userfile into array
        $users = explode("JSON.parse", $userfile);
        $data = json_encode($users[1], true);
        $map = json_decode($data);

        $start = strpos($map, '(') + 1;
        $end = strpos($map, ');', $start);
        $datas = substr($map, $start, $end - $start);

        $map1 = json_decode($datas);
        $map2 = json_decode($map1);

        return $map2->dataList;
    }
}
