@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">{{ $subtitulo }}</div>

                <div class="card-body">

                        <div class="row mb-3">

                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Geral</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Anexo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Imagem</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h4> Recurso: <strong class="text-secondary">{{ $recurso->nome }}</strong></h4>
                                <h4>Tipo: <strong class="text-secondary">{{ $recurso->tipo }}</strong></h4>
                                <p>Curso: <strong class="text-secondary">{{ $curso->nome }}</strong></p>
                                <p> Aula: <strong class="text-secondary">{{ $aula->nome }}</strong></p>
                                <p> Descrição: <strong class="text-secondary">{{ $aula->descricao }}</strong></p>
                                <p> Detalhe: <strong class="text-secondary">{{ $recurso->descricao }}</strong></p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @if (!$recurso->anexo)
                                    {{ __('Nenhum anexo acrescentado.') }}
                                @else
                                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                    <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;" frameborder="0" type="text/html" src="{{ asset('storage/'.$recurso->anexo) }}" width="100%" height="100%" allowfullscreen="" allow="autoplay">
                                    </iframe>
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                @if (!$recurso->imagem)
                                    {{ __('Nenhuma imagem cadastrada.') }}
                                @else
                                    <img src="{{ asset('storage/'.$recurso->imagem) }}" width="100%" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a class="btn btn-primary mb-2" href="{{ route('recursos.edit', $recurso->id) }}">
                                    <i class="fas fa-user-edit"></i> Gerenciar Recurso
                                </a>
                                <a class="btn btn-primary mb-2" href="{{ url('admin/recursos') }}">
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
