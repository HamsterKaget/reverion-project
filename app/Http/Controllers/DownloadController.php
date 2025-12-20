<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    public function index()
    {
        return view('frontend.pages.download.index');
    }
}

