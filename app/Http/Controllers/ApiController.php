<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ApiController extends Controller
{
    public function show(Artikel $artikel){
        return $artikel;
    }
}
