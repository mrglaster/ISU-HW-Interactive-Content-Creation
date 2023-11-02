<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowDataController extends Controller
{
        public function index(){
        return view('show-content');
    }
}
