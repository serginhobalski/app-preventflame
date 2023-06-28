@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ $subtitulo }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('recursos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="aula_id" class="col-md-4 col-form-label text-md-end">{{ __('Aula') }}</label>
                            <div class="col-md-6">
                                <select name="aula_id" id="aula_id" class="form-control" >
                                    @if (!$aulas)
                                        <option value="">Nenhuma aula disponível...</option>
                                    @else
                                        @foreach ($aulas as $aula)
                                            <option value="{{$aula->id}}">
                                                {{ $aula->nome }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Recurso') }}</label>
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
                                <textarea id="descricao" name="descricao" cols="30" rows="10" class="form-control">{{ old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo') }}</label>
                            <div class="col-md-6">
                                <select  id="tipo" name="tipo" class="form-control">
                                    <option value="pdf">PDF</option>
                                    <option value="imagem">Imagem</option>
                                    <option value="video">Vídeo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" autocomplete="link" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>
                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" autocomplete="codigo" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="imagem" id="imagem" class="form-control"  value="{{ old('imagem') }}" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anexo" class="col-md-4 col-form-label text-md-end">{{ __('Anexo') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="anexo" id="anexo" class="form-control"  value="{{ old('anexo') }}" accept=".jpg, .jpeg, .png, .pdf, .mp4">
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
