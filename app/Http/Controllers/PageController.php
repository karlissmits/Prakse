<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $title = 'Hello!';
        //return view('pages.index', compact('title'));
            return view('pages.index')->with('title', $title);
    }
    public function about(){
            $title = 'About us page';
            return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
           return view('pages.services')->with($data);
    }
}

