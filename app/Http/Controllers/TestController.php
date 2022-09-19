<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function toep()
    {
        return view("pages/mahasiswa/toep");
    }
    public function toefl()
    {
        return view("pages/mahasiswa/toefl");
    }
}
