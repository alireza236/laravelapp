<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class pagesController extends Controller
{
    //
    public function homepage(){
        return view('pages.homepage');
    }

    public function about(){
        $halaman = 'about';
        return view('pages.about', compact('halaman'));
    }
}
