<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $data = [
            'titulo' => 'Início',
            'subtitulo' => 'Página Inicial',
        ];
        return view('site.index')->with($data);
    }

    public function sobre()
    {
        $data = [
            'titulo' => 'Sobre Nós',
            'subtitulo' => 'Prevent Flame Treinamentos',
        ];
        return view('site.sobre')->with($data);
    }

    public function contato()
    {
        $data = [
            'titulo' => 'Contato',
            'subtitulo' => 'Entre em contato',
        ];
        return view('site.contato')->with($data);
    }

    public function cursos()
    {
        $data = [
            'titulo' => 'Cursos',
            'subtitulo' => 'Cursos Prevent Flame',
        ];
        return view('site.cursos')->with($data);
    }

    public function curso_detalhes()
    {
        $data = [
            'titulo' => 'Curso',
            'subtitulo' => 'Detalhes do curso',
        ];
        return view('site.curso_detalhes')->with($data);
    }

    public function loja()
    {
        $data = [
            'titulo' => 'Loja',
            'subtitulo' => 'Nossos produtos',
        ];
        return view('site.loja')->with($data);
    }

    public function detalhe_produto()
    {
        $data = [
            'titulo' => 'Produto',
            'subtitulo' => 'Detalhe do produto',
        ];
        return view('site.detalhe_produto')->with($data);
    }

    public function carrinho()
    {
        $data = [
            'titulo' => 'Carrinho',
            'subtitulo' => 'Carrinho de compras',
        ];
        return view('site.carrinho')->with($data);
    }

    public function checkout()
    {
        $data = [
            'titulo' => 'Checkout',
            'subtitulo' => 'Confirmação de compra',
        ];
        return view('site.checkout')->with($data);
    }
}
