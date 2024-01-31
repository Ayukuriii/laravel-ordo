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

    public function tambah(Request $request)
    {
        $angka1 = $request->query('angka1');
        $angka2 = $request->query('angka2');

        $res = $angka1 + $angka2;

        return $res;
    }
}
