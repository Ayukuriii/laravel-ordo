<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function hello()
    {
        return "hello world";
    }

    public function perkalian(int $angka = null)
    {
        $res = $angka * 2;

        return $res;
    }
}
