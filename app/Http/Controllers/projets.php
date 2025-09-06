<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projets extends Controller
{
    
    public function index(){
        return view('projets');
    }
}
