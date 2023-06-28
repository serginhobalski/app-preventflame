<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Recurso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Painel do Aluno',
            'subtitulo' => 'Painel de ' . Auth::user()->name,
        ];
        return view('aluno.index', $data);
    }

    public function atualizar(string $id)
    {
        $usuario = User::findOrFail($id);
        $data = [
            'titulo' => Auth::user()->name,
            'subtitulo' => 'Editando detalhes do usuário ' . $usuario->name,
            'usuario' => $usuario,
        ];
        return view('usuarios.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'surname' => ['nullable', 'max:200'],
            'username' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'group' => ['required', 'max:100'],
            'image' => ['nullable', 'file'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->group = $request->input('group');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('usuarios', $agora . '.' . $extension);
            $user->image = $imagePath;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('aluno')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function curso($id)
    {
        $curso = Curso::find($id);
        $aulas = Aula::all()->where('curso_id', '=', $curso->id);
        $data = [
            'titulo' => $curso->nome,
            'subtitulo' => 'Detalhes de ' . $curso->nome,
            'slug' => 'aluno',
            'curso' => $curso,
            'aulas' => $aulas,
        ];
        return view('aluno.curso', $data);
    }

    public function aula($id)
    {
        $aula = Aula::find($id);
        $curso = Curso::find($aula->curso_id);
        $recursos = Recurso::all()->where('aula_id', '=', $aula->id);
        $data = [
            'titulo' => $aula->nome,
            'subtitulo' => 'Aula ' . $aula->nome,
            'slug' => 'aluno',
            'aula' => $aula,
            'recursos' => $recursos,
            'curso' => $curso,
        ];
        return view('aluno.aula', $data);
    }
}
