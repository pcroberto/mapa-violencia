@extends('layouts.app')

@section('title', 'Início')

@section('style')
   <style>
       .info-painel {
            height: 47vh
       }

       #cidade {
           width: 10vw
       }

   </style> 
@endsection

@section('content')
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Veja os crimes que acontecem<br>na sua cidade</h1>
            <br>
            {{-- <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p> --}}
            {{ Form::open(['route' => 'all.ocorrencia']) }}
                <center>
                    <div class="form-group col-md-5">
                        {{ Form::select(
                            "cidade", 
                            $cidades->all(),
                            null, 
                            ['class' => 'form-control', 'placeholder' => 'Selecione uma cidade...', 'required']
                        ) }}
                    </div>
                    <div class="form-group">
                        {{Form::submit("Buscar", [ 'class' => 'btn btn-info' ])}}
                    </div>
                <center>
            {{ Form::close() }}
        </div>
    </section>
    <div class="info-painel">
    </div>
</main>

@endsection


@section('scripts')
    <script>
    </script>    
@endsection