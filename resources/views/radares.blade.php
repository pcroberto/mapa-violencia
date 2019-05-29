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
                    <th scope="col">#</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>
                @if ($radares->count() == 0)
                    <tr>
                        <td colspan="5"><span class="center">Não há nenhum radar cadastrado. Para cadastrar, clica no botão 'Novo'.</span>
                    </tr>
                @endif

                @foreach ($radares as $radar)
                    <tr>
                        <th scope='row'>{{ $radar->id }}</th>
                        <td>{{ $radar->ativo ? 'Ativo' : 'Desativado' }}</td>
                        <td>{{ Illuminate\Support\Carbon::create($radar->created_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $radar->nome }}</td>
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
