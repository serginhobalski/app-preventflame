@extends('layouts.admin')

@section('styles')
@endsection

@section('content')
<div class="container mt-3 mb-2">
    <div class="row">
        <div class="col-12 text-center">
            <h4> {{ $titulo }} </h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            @foreach ($aulas as $aula)
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <a class="text-white" href="{{url('aluno/aula/'.$aula->id)}}">
                            <i class="fas fa-book-reader"></i> {{ $aula->nome }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6 mr-2">
            @if (!$curso->imagem)
                <img src="{{ asset('src/img/feature_.jpg') }}" width="100%" alt="">
            @else
                <img src="{{ asset('storage/' . $curso->imagem) }}" width="100%" alt="">
            @endif
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection
