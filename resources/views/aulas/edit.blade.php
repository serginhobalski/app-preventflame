@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ $subtitulo }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('aulas.update', $aula->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="curso_id" class="col-md-4 col-form-label text-md-end">{{ __('Curso') }}</label>
                            <div class="col-md-6">
                                <input id="curso_id" type="text" class="form-control @error('curso_id') is-invalid @enderror" name="curso_id" value="{{ $aula->curso_id }}" required autocomplete="curso_id" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Aula') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $aula->nome }}" required autocomplete="nome" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea id="descricao" name="descricao" cols="30" rows="10" class="form-control" >{{ $aula->descricao }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código (opcional)') }}</label>
                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{ $aula->codigo }}" autocomplete="codigo" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
                            <div class="col-md-6">
                                <input type="text" id="link" class="form-control" name="link"
                                value="{{$aula->link}}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                            <div class="col-md-6">
                                <input id="ch" type="text" class="form-control" name="ch" value="{{ $aula->ch }}" autocomplete="ch" autofocus>
                                <span class="text-info" >*Utilize apenas números intiros.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>
                            <div class="col-md-6">
                                @if (!$aula->imagem)
                                    {{ __('Nenhuma imagem cadastrada para este curso') }}
                                @else
                                    <img src="{{ asset('storage/'.$aula->imagem) }}" width="100%" alt="">
                                @endif
                                <input type="file" name="imagem" id="imagem" class="form-control"  value="{{ old('imagem') }}" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success mb-2">
                                    <i class="fas fa-user-edit"></i> {{ __('Atualizar') }}
                                </button>
                                <a class="btn btn-primary mb-2" href="{{ url('admin/aulas') }}">
                                    <i class="fas fa-undo-alt"></i> Voltar
                                </a>
                                <a class="btn btn-danger mb-2" href="{{ route('aulas.destroy', $aula->id) }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('delete-form').submit();">
                                    <i class="fas fa-trash-alt"></i> {{ __('Deletar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                    <form id="delete-form" action="{{ route('aulas.destroy', $aula->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
