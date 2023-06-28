@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ __('CADASTRAR CURSO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome do curso') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea id="descricao" name="descricao" cols="30" rows="10" class="form-control" value="{{ old('descricao') }}"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código (opcional)') }}</label>
                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" autocomplete="codigo" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select id="categoria" class="form-control" name="categoria">
                                    <option value="usuario">Capacitação Continuada</option>
                                    <option value="colaborador">Formação</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status">
                                    <option class="text-success" value="1">Ativo</option>
                                    <option class="text-danger" value="0">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="valor" class="col-md-4 col-form-label text-md-end">{{ __('Valor') }}</label>
                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control" name="valor" value="{{ old('valor') }}" autocomplete="valor" autofocus>
                                <span class="text-info" >*Utilize apenas números. **Use o ponto "." para separar as casas decimais. Ex: 4.5</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                            <div class="col-md-6">
                                <input id="ch" type="text" class="form-control" name="ch" value="{{ old('ch') }}" autocomplete="ch" autofocus>
                                <span class="text-info" >*Utilize apenas números intiros.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="imagem" id="imagem" class="form-control"  value="{{ old('imagem') }}" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
