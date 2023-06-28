@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ __('DETALHES DO CURSO') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome do curso') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $curso->nome }}</strong></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $curso->descricao }}</strong></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código (opcional)') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $curso->codigo }}</strong></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <p> <strong class="text-secondary">{{ $curso->categoria }}</strong> </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                @if ($curso->status == true)
                                    <span class="text-success"> Ativo</span>
                                @else
                                    <span class="text-danger"> Inativo</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="valor" class="col-md-4 col-form-label text-md-end">{{ __('Valor') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">R$ {{ implode(',', explode('.', $curso->valor)) }}</strong>  </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $curso->ch }}H/a</strong>  </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>
                            <div class="col-md-6">
                                @if (!$curso->imagem)
                                    {{ __('Nenhuma imagem cadastrada para este curso') }}
                                @else
                                    <img src="{{ asset('storage/'.$curso->imagem) }}" width="100%" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a class="btn btn-primary mb-2" href="{{ route('cursos.edit', $curso->id) }}">
                                    <i class="fas fa-user-edit"></i> Gerenciar Curso
                                </a>
                                <a class="btn btn-primary mb-2" href="{{ url('admin/cursos') }}">
                                    <i class="fas fa-undo-alt"></i> Voltar
                                </a>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
