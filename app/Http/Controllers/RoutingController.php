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
        //validation
        $validatedData = $request->validate([
            'angka1' => 'required | numeric',
            'angka2' => 'required | numeric'
        ]);

        $angka1 = $validatedData['angka1'];
        $angka2 = $validatedData['angka2'];

        $res = $angka1 + $angka2;

        $dataResult = array(
            'angka1' => $angka1,
            'angka2' => $angka2,
            'result' => $res
        );

        return view('introduction.pertambahan', ['data' => $dataResult]);
    }
}
