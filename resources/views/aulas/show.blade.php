@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ __('DETALHES DA AULA') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome do curso') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $aula->nome }}</strong></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $aula->descricao }}</strong></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $aula->codigo }}</strong></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
                            <div class="col-md-6">
                                @if (!$aula->link)
                                    <p>
                                        <strong class="text-secondary">
                                            Nenhum link cadastrado...
                                        </strong>
                                    </p>
                                @else
                                    <p><strong class="text-secondary">{{ $aula->link }}</strong></p>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                            <div class="col-md-6">
                                <p><strong class="text-secondary">{{ $aula->ch }}H/a</strong>  </p>
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
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a class="btn btn-primary mb-2" href="{{ route('aulas.edit', $aula->id) }}">
                                    <i class="fas fa-user-edit"></i> Gerenciar Aula
                                </a>
                                <a class="btn btn-primary mb-2" href="{{ url('admin/aulas') }}">
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
