@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Despesas</h4>
                        <p class="card-category">Lista de despesas
                            registradas</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($records as $record)
                                        <tr>
                                            <td>{{ $record->id }}</td>
                                            <td>{{ $record->description }}</td>
                                            <td>{{ money($record->amount) }}</td>
                                            <td>{{ $record->issue_date->format('d/m/Y') }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('expense.edit', $record->id) }}"
                                                   rel="tooltip"
                                                   class="btn btn-info btn-link"
                                                   data-original-title="Editar"
                                                   title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{ route('expense.destroy', $record->id) }}"
                                                   rel="tooltip"
                                                   class="btn btn-danger btn-link delete-resource"
                                                   data-original-title="Excluir"
                                                   title="Excluir">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Nenhum registro
                                                encontrado
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('expense.create') }}"
       class="btn btn-fab btn-lg btn-round btn-primary text-white"
       type="button">
        <i class="material-icons pmd-sm">add</i>
    </a>
@endsection
