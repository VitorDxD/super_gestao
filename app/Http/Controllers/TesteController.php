<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste (int $param1, int $param2) {
        return view('site.teste', compact('param1', 'param2'));
    }
}
