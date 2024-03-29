@extends('layouts.app')

@section('title', 'Radares')

@section('content')
<div class="container my-3 p-3 bg-white rounded shadow-lg">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-10"><h3>Radares</h3></div>
            <div class="col-sm-2 text-right">
                <a class="btn btn-info add-new" href="{{ route('novo.radar') }}"
                    <span class="text-white"><i class="fa fa-plus" aria-hidden="true"></i> Novo</span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Raio</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>
                @if ($radares->count() == 0)
                    <tr>
                        <td colspan="3"><span class="center">Não há nenhum radar cadastrado. Para cadastrar, clica no botão 'Novo'.</span>
                    </tr>
                @endif

                @foreach ($radares as $radar)
                    <tr>
                        <td scope='row'>{{ $radar->nome }}</td>
                        <td>{{ $radar->localizacao->endereco }}</td>
                        <td>{{ $radar->raio }} metros</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('remover.radar', ['id' => $radar->id]) }}">{{__('Remover')}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@section('scripts')
    <script>
    </script>

    
@endsection
