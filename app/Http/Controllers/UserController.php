<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
                'name',
                'email',
                'group',
            ];
            $usuarios = User::all($atributos);

            $data = [];

            foreach ($usuarios as $usuario) {
                $data[] = [
                    'id' => $usuario->id,
                    'name' => '<a href="' . route('usuarios.show', $usuario->id) . '">' . $usuario->name . '</a>',
                    'email' => $usuario->email,
                    'group' => strtoupper($usuario->group),
                ];
            }

            $retorno = [
                'data' => $data,
            ];

            return response()->json($retorno);
        }
        $usuarios = User::all();
        $data = [
            'titulo' => 'Criar usuário',
            'subtitulo' => 'Cadastrando usuário no sistema',
            'slug' => 'usuarios',
            'usuarios' => $usuarios,
        ];
        return view('usuarios.index')->with($data);
    }


    public function create()
    {
        $data = [
            'titulo' => 'Criar usuário',
            'subtitulo' => 'Cadastrando usuário no sistema',
            'slug' => 'usuarios',
        ];
        return view('usuarios/create')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'surname' => ['nullable', 'max:200'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'group' => ['required', 'max:100'],
            'image' => ['nullable', 'file'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->group = $request->input('group');
        $user->password = Hash::make($request->input('password'));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('usuarios', $agora . '.' . $extension);
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso.');
    }


    public function show(string $id)
    {
        $usuario = User::find($id);
        $data = [
            'titulo' => 'Usuário',
            'subtitulo' => 'Exibindo detalhes do usuário ' . $usuario->name,
            'usuario' => $usuario,
            'slug' => 'usuarios',
        ];
        return view('usuarios.show', $data);
    }


    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        $data = [
            'titulo' => 'Usuário',
            'subtitulo' => 'Editando detalhes do usuário ' . $usuario->name,
            'usuario' => $usuario,
            'slug' => 'usuarios',
        ];
        return view('usuarios.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        // dd($request);
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

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }


    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso.');
    }
}
