<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaptopController extends Controller
{
    //
    public function __invoke(){
        return '__invoke';
    }
    public function index()
    {
        return 'Index Laptop';
    }
}
