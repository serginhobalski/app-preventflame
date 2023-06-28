@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ $subtitulo }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('recursos.update', $recurso->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="aula_id" class="col-md-4 col-form-label text-md-end">{{ __('Aula') }}</label>
                            <div class="col-md-6">
                                <input id="aula_id" type="text" class="form-control @error('aula_id') is-invalid @enderror" name="aula_id" value="{{ $recurso->aula_id }}" required autocomplete="aula_id" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Recurso') }}</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $recurso->nome }}" required autocomplete="nome" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea id="descricao" name="descricao" cols="30" rows="10" class="form-control" >{{ $recurso->descricao }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>
                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{ $recurso->codigo }}" autocomplete="codigo" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
                            <div class="col-md-6">
                                <input type="text" id="link" class="form-control" name="link"
                                value="{{$recurso->link}}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo') }}</label>
                            <div class="col-md-6">
                                <select  id="tipo" class="form-control" name="tipo">
                                    <option value="pdf"
                                    {{( $recurso->tipo == 'pdf' ? 'selected' : '') }}>
                                        PDF
                                    </option>
                                    <option value="imagem"
                                    {{( $recurso->tipo == 'imagem' ? 'selected' : '') }}>
                                        Imagem
                                    </option>
                                    <option value="video"
                                    {{( $recurso->tipo == 'video' ? 'selected' : '') }}>
                                        Vídeo
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                            <div class="col-md-6">
                                <input id="ch" type="text" class="form-control" name="ch" value="{{ $recurso->ch }}" autocomplete="ch" autofocus>
                                <span class="text-info" >*Utilize apenas números intiros.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>
                            <div class="col-md-6">
                                @if (!$recurso->imagem)
                                    {{ __('Nenhuma imagem cadastrada para este curso') }}
                                @else
                                    <img src="{{ asset('storage/'.$recurso->imagem) }}" width="100%" alt="">
                                @endif
                                <input type="file" name="imagem" id="imagem" class="form-control"  value="{{ old('imagem') }}" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anexo" class="col-md-4 col-form-label text-md-end">{{ __('Anexo') }}</label>
                            <div class="col-md-6">
                                @if (!$recurso->anexo)
                                    {{ __('Nenhum anexo cadastrado para este recurso') }}
                                @else
                                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                    <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;" frameborder="0" type="text/html" src="{{ asset('storage/'.$recurso->anexo) }}" width="100%" height="100%" allowfullscreen="" allow="autoplay">
                                    </iframe>
                                </div>
                                    {{-- <img src="{{ asset('storage/'.$recurso->anexo) }}" width="100%" alt=""> --}}
                                @endif
                                <input type="file" name="anexo" id="anexo" class="form-control"  value="{{ old('anexo') }}" accept=".jpg, .jpeg, .png, .pdf, .mp4">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success mb-2">
                                    <i class="fas fa-user-edit"></i> {{ __('Atualizar') }}
                                </button>
                                <a class="btn btn-primary mb-2" href="{{ url('admin/recursos') }}">
                                    <i class="fas fa-undo-alt"></i> Voltar
                                </a>
                                <a class="btn btn-danger mb-2" href="{{ route('recursos.destroy', $recurso->id) }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('delete-form').submit();">
                                    <i class="fas fa-trash-alt"></i> {{ __('Deletar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                    <form id="delete-form" action="{{ route('recursos.destroy', $recurso->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
