<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
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
                'aula_id',
                'nome',
                'tipo',
            ];
            $recursos = Recurso::all($atributos);

            $data = [];

            foreach ($recursos as $recurso) {
                $data[] = [
                    'id' => $recurso->id,
                    'aula_id' => $recurso->aula_id,
                    'nome' => '<a href="' . route('recursos.show', $recurso->id) . '">' . $recurso->nome . '</a>',
                    'tipo' => $recurso->tipo,
                ];
            }

            $retorno = [
                'data' => $data,
            ];

            return response()->json($retorno);
        }
        $recursos = Recurso::all();
        $data = [
            'titulo' => 'Recursos',
            'subtitulo' => 'Gerenciando os recursos da aulas',
            'slug' => 'recursos',
            'recursos' => $recursos,
        ];
        return view('recursos.index')->with($data);
    }

    public function create()
    {
        $aulas = Aula::all();
        $data = [
            'titulo' => 'Cadastrar recurso',
            'subtitulo' => 'Cadastrando recurso da aula',
            'slug' => 'recursos',
            'aulas' => $aulas,
        ];
        return view('recursos.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'aula_id' => ['required'],
            'nome' => ['required', 'max:100'],
            'descricao' => ['nullable', 'max:200'],
            'tipo' => ['required', 'string', 'max:55'],
            'link' => ['nullable'],
            'codigo' => ['nullable', 'string', 'max:55'],
            'imagem' => ['nullable', 'file'],
            'anexo' => ['nullable', 'file'],
        ]);

        $recurso = new Recurso();

        $recurso->aula_id = $request->input('aula_id');
        $recurso->nome = $request->input('nome');
        $recurso->descricao = $request->input('descricao');
        $recurso->tipo = $request->input('tipo');
        $recurso->link = $request->input('link');
        $recurso->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $recurso->imagem = $imagePath;
        }

        if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
            $image = $request->file('anexo');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('recursos', $agora . '.' . $extension);
            $recurso->anexo = $imagePath;
        }

        $recurso->save();

        return redirect()->route('recursos.index')->with('success', 'Recurso cadastrado com sucesso.');
    }

    public function show(string $id)
    {
        $recurso = Recurso::find($id);
        $aula = Aula::find($recurso->aula_id);
        $curso = Curso::find($aula->curso_id);
        $data = [
            'titulo' => $recurso->nome,
            'subtitulo' => 'Detalhes de ' . $recurso->nome,
            'slug' => 'recursos',
            'recurso' => $recurso,
            'aula' => $aula,
            'curso' => $curso,
        ];
        // dd($data);
        return view('recursos.show')->with($data);
    }


    public function edit(string $id)
    {
        $recurso = Recurso::find($id);
        $aula = Aula::find($recurso->aula_id);
        $data = [
            'titulo' => $recurso->nome,
            'subtitulo' => 'Detalhes de ' . $recurso->nome,
            'slug' => 'recursos',
            'recurso' => $recurso,
            'aula' => $aula,
        ];
        // dd($data);
        return view('recursos.edit')->with($data);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'aula_id' => ['required'],
            'nome' => ['required', 'max:100'],
            'descricao' => ['nullable', 'max:200'],
            'tipo' => ['required', 'string', 'max:55'],
            'link' => ['nullable'],
            'codigo' => ['nullable', 'string', 'max:55'],
            'imagem' => ['nullable', 'file'],
            'anexo' => ['nullable', 'file'],
        ]);

        $recurso = Recurso::find($id);

        $recurso->aula_id = $request->input('aula_id');
        $recurso->nome = $request->input('nome');
        $recurso->descricao = $request->input('descricao');
        $recurso->tipo = $request->input('tipo');
        $recurso->link = $request->input('link');
        $recurso->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $recurso->imagem = $imagePath;
        }

        if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {
            $image = $request->file('anexo');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('recursos', $agora . '.' . $extension);
            $recurso->anexo = $imagePath;
        }

        $recurso->save();

        return redirect()->route('recursos.index')->with('success', 'Recurso atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        Recurso::destroy($id);

        return redirect()->route('recursos.index')->with('success', 'Recurso deletado com sucesso.');
    }
}
