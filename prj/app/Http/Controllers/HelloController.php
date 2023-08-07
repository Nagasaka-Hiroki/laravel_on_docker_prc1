<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index(Request $request) {
        return view('hello.index');
    }

    public function post(){
        $data=['one','two','three','four','five'];
        return view('hello.index',['data'=>$data]);
    }
}
