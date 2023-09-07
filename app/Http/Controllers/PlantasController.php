<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantasController extends Controller
{
    public function plantas(){
        return view('site.plantas');
    }
}
