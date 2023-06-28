<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function painel()
    {
        $data = [
            'titulo' => 'Painel',
            'subtitulo' => 'Painel administrativo',
            'slug' => 'admin',
        ];
        return view('admin.index', $data);
    }

}
