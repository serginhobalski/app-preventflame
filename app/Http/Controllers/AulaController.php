<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use Illuminate\Http\Request;

class AulaController extends Controller
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
                'curso_id',
                'nome',
                'descricao',
            ];
            $aulas = Aula::all($atributos);

            $data = [];

            foreach ($aulas as $aula) {
                $data[] = [
                    'curso_id' => $aula->curso_id,
                    'nome' => '<a href="' . route('aulas.show', $aula->id) . '">' . $aula->nome . '</a>',
                    'descricao' => $aula->descricao,
                ];
            }

            $retorno = [
                'data' => $data,
            ];

            return response()->json($retorno);
        }
        $aulas = Aula::all();
        $data = [
            'titulo' => 'Aulas',
            'subtitulo' => 'Gerenciando aulas dos cursos',
            'slug' => 'aulas',
            'aulas' => $aulas,
        ];
        return view('aulas.index')->with($data);
    }

    public function create()
    {
        $cursos = Curso::all();
        $data = [
            'titulo' => 'Cadastrar aula',
            'subtitulo' => 'Cadastrando aula',
            'slug' => 'aulas',
            'cursos' => $cursos,
        ];
        return view('aulas.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => ['required'],
            'nome' => ['required', 'max:100'],
            'descricao' => ['nullable', 'max:200'],
            'ch' => ['nullable'],
            'link' => ['nullable', 'string', 'max:255'],
            'codigo' => ['nullable', 'string', 'max:55'],
            'imagem' => ['nullable', 'file'],
        ]);

        $aula = new Aula();

        $aula->curso_id = $request->input('curso_id');
        $aula->nome = $request->input('nome');
        $aula->descricao = $request->input('descricao');
        $aula->ch = $request->input('ch');
        $aula->link = $request->input('link');
        $aula->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('aulas', $agora . '.' . $extension);
            $aula->imagem = $imagePath;
        }

        $aula->save();

        return redirect()->route('aulas.index')->with('success', 'Aula cadastrada com sucesso.');
    }

    public function show(string $id)
    {
        $aula = Aula::find($id);
        $data = [
            'titulo' => 'Aula',
            'subtitulo' => 'Detalhes da aula',
            'slug' => 'aulas',
            'aula' => $aula,
        ];
        return view('aulas.show')->with($data);
    }

    public function edit(string $id)
    {
        $aula = Aula::find($id);
        $data = [
            'titulo' => $aula->nome,
            'subtitulo' => 'Gerenciando ' . $aula->nome,
            'slug' => 'aulas',
            'aula' => $aula,
        ];
        return view('aulas.edit')->with($data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'curso_id' => ['required'],
            'nome' => ['required', 'max:100'],
            'descricao' => ['nullable', 'max:200'],
            'ch' => ['nullable'],
            'link' => ['nullable', 'string', 'max:255'],
            'codigo' => ['nullable', 'string', 'max:55'],
            'imagem' => ['nullable', 'file'],
        ]);

        $aula = Aula::find($id);

        $aula->curso_id = $request->input('curso_id');
        $aula->nome = $request->input('nome');
        $aula->descricao = $request->input('descricao');
        $aula->ch = $request->input('ch');
        $aula->link = $request->input('link');
        $aula->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('aulas', $agora . '.' . $extension);
            $aula->imagem = $imagePath;
        }

        $aula->save();

        return redirect()->route('aulas.index')->with('success', 'Aula atualizada com sucesso.');
    }

    public function destroy(string $id)
    {
        Aula::destroy($id);

        return redirect()->route('aulas.index')->with('success', 'Aula deletada com sucesso.');
    }
}
