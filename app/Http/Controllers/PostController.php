<?php

namespace App\Http\Controllers;


class PostController extends Controller
{


    public function index()
    {
        phpinfo();
        return view('forms.search');
    }
}
