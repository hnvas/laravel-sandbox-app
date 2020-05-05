@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('components.card-container', [
                            'return'   => 'dashboard.index',
                            'title'    => 'Contas',
                            'category' => 'Listagem de contas'])
                    @slot('body')
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('models.account.attributes.name') }}</th>
                                        <th>{{ trans('models.account.attributes.balance') }}</th>
                                        <th>{{ trans('models.account.attributes.special_limit') }}</th>
                                        <th>{{ trans('models.account.attributes.owner') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($records as $record)
                                        <tr>
                                            <td>{{ $record->id }}</td>
                                            <td>{{ $record->name }}</td>
                                            <td>{{ money($record->balance) }}</td>
                                            <td>{{ money($record->special_limit) }}</td>
                                            <td>{{ $record->owner->name }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('account.edit', $record->id) }}"
                                                   rel="tooltip"
                                                   class="btn btn-info btn-link"
                                                   data-original-title="Editar"
                                                   title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{ route('account.destroy', $record->id) }}"
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
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
    @include('components.buttons.new', ['route' => 'account.create'])
@endsection
