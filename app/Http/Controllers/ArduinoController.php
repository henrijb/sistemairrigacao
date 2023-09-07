<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArduinoController extends Controller
{
    public function arduino() {
        return view('site.arduino');
    }
}
