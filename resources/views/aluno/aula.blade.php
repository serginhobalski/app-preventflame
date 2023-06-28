@extends('layouts.admin')

@section('styles')
@endsection

@section('content')
<div class="container mt-3 mb-2">
    <div class="row">
        <div class="col-12 text-center">
            <h4> {{ $titulo }} </h4>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('aluno/curso/'.$curso->id)}}">{{$curso->nome}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$aula->nome}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Geral</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Recursos</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Extras</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h4> Aula: <strong class="text-secondary">{{ $aula->nome }}</strong></h4>
                    <p>Curso: <strong class="text-secondary">{{ $curso->nome }}</strong></p>
                    <p>CH: <strong class="text-secondary">{{ $curso->ch }}</strong></p>
                    <p> Descrição: <strong class="text-secondary">{{ $aula->descricao }}</strong></p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if (!$recursos)
                        {{ __('Nenhum recurso cadastrado.') }}
                    @else
                        @foreach ($recursos as $recurso)
                        <span> {{$recurso->nome}} | Formato: {{$recurso->tipo}} </span>
                        <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                            <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;" frameborder="0" type="text/html" src="{{ asset('storage/'.$recurso->anexo) }}" width="100%" height="100%" allowfullscreen="" allow="autoplay">
                            </iframe>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection
