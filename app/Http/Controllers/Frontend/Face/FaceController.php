<?php

namespace App\Http\Controllers\Frontend\Face;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaceController extends Controller
{
    function index() 
    {
        return view('web.layout');
    }
}
