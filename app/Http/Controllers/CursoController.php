<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        if (request()->ajax()) {
            $atributos = [
                'id',
                'nome',
                'categoria',
                'valor',
                'status',
            ];
            $cursos = Curso::all($atributos);

            $data = [];

            foreach ($cursos as $curso) {
                $data[] = [
                    'id' => $curso->id,
                    'nome' => '<a href="' . route('cursos.show', $curso->id) . '">' . $curso->nome . '</a>',
                    'categoria' => $curso->categoria,
                    'valor' => 'R$ ' . implode(',', explode('.', $curso->valor)),
                    'status' => ($curso->status == true ? '<span class="text-success">Ativo</span>' : '<span class="text-danger">Inativo</span>'),
                ];
            }

            $retorno = [
                'data' => $data,
            ];

            return response()->json($retorno);
        }
        $cursos = Curso::all();
        $data = [
            'titulo' => 'Cursos',
            'subtitulo' => 'Gerenciando os cursos do sistema',
            'slug' => 'cursos',
            'cursos' => $cursos,
        ];
        return view('cursos.index')->with($data);
    }

    public function create()
    {
        $data = [
            'titulo' => 'Criar curso',
            'subtitulo' => 'Cadastrando curso no sistema',
            'slug' => 'cursos',
        ];
        return view('cursos.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'max:100'],
            'descricao' => ['nullable', 'max:200'],
            'codigo' => ['required', 'string', 'max:55'],
            'categoria' => ['required', 'string', 'max:55'],
            'status' => ['required'],
            'valor' => ['required'],
            'ch' => ['required'],
            'imagem' => ['nullable', 'file'],
        ]);

        $curso = new Curso();

        $curso->nome = $request->input('nome');
        $curso->descricao = $request->input('descricao');
        $curso->codigo = $request->input('codigo');
        $curso->categoria = $request->input('categoria');
        $curso->status = $request->input('status');
        $curso->valor = $request->input('valor');
        $curso->ch = $request->input('ch');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $curso->imagem = $imagePath;
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }


    public function show(string $id)
    {
        $curso = Curso::find($id);
        $data = [
            'titulo' => 'Cursos',
            'subtitulo' => 'Gerenciando os cursos do sistema',
            'slug' => 'cursos',
            'curso' => $curso,
        ];
        return view('cursos.show')->with($data);
    }


    public function edit(string $id)
    {
        $curso = Curso::find($id);
        $data = [
            'titulo' => $curso->nome,
            'subtitulo' => 'Gerenciando ' . $curso->nome,
            'slug' => 'cursos',
            'curso' => $curso,
        ];
        return view('cursos.edit')->with($data);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => ['required', 'max:100'],
            'descricao' => ['nullable', 'max:200'],
            'codigo' => ['required', 'string', 'max:55'],
            'categoria' => ['required', 'string', 'max:55'],
            'status' => ['required'],
            'valor' => ['required'],
            'ch' => ['required'],
            'imagem' => ['nullable', 'file'],
        ]);

        $curso = Curso::find($id);

        $curso->nome = $request->input('nome');
        $curso->descricao = $request->input('descricao');
        $curso->codigo = $request->input('codigo');
        $curso->categoria = $request->input('categoria');
        $curso->status = $request->input('status');
        $curso->valor = $request->input('valor');
        $curso->ch = $request->input('ch');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $curso->imagem = $imagePath;
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }


    public function destroy(string $id)
    {
        Curso::destroy($id);

        return redirect()->route('cursos.index')->with('success', 'Curso deletado com sucesso.');
    }
}
