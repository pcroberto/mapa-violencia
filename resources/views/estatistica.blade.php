@extends('layouts.app')

@section('title', 'Estatística')

@section('style')
    <style>
        .form {
            height: 86vh;
        }
    </style>
@endsection

@section('content')
<div class="form">
<div class="container my-3 p-3 bg-white rounded shadow-lg">
    {{ Form::open(['route' => 'emitir.estatistica']) }}
        @if(\Session::has('mensagem_sucesso'))
            <div class="alert alert-success">{{ \Session::get('mensagem_sucesso') }}</div>
        @endif

        @if(\Session::has('mensagem_erro'))
            <div class="alert alert-danger">{{ \Session::get('mensagem_erro') }}</div>
        @endif
        <div class="form-group">
            {{ Form::label("tipo", "Tipo de Emissão", ['class' => 'form-label-sm']) }}
            {{ Form::select(
                "tipo", 
                [
                    1 => "Mapa de Calor",
                    2 => "Gráfico mensal"
                ], 
                null, 
                ['class' => 'form-control form-control-sm ', 'placeholder' => "Selecione...", "required"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("crime", "Crime dejesado", ['class' => 'form-label-sm']) }}
            {{ Form::select(
                "crime", 
                App\Model\Crime::pluck('descricao', 'id'), 
                null, 
                ['class' => 'form-control form-control-sm ', 'placeholder' => 'Todos']
            ) }}
        </div>
        <div class="form-group">
            {{ Form::label("data_inicio", "Data Inicial", ['class' => 'form-label-sm']) }}
            {{ Form::date("data_inicio", null, ['class' => 'form-control form-control-sm', 'max' => Illuminate\Support\Carbon::today()->format('Y-m-d')]) }}
            <small class="form-text text-muted">Exemplo: 30/04/2019</small>
        </div>
        <div class="form-group">
            {{ Form::label("data_fim", "Data Final", ['class' => 'form-label-sm']) }}
            {{ Form::date("data_fim", null, ['class' => 'form-control form-control-sm', 'max' => Illuminate\Support\Carbon::today()->format('Y-m-d')]) }}
            <small class="form-text text-muted">Exemplo: 30/04/2019</small>
        </div>

        {{Form::submit("Emitir", [ 'class' => 'btn btn-info' ])}}
    {{ Form::close() }}
    
</div>
</div>
@endsection


@section('scripts')
    <script>
    </script>

    
@endsection
