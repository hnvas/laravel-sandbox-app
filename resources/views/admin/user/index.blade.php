@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('components.card-container', [
                            'return'   => 'dashboard.index',
                            'title'    => 'Usuários',
                            'category' => 'Listagem de usuários'])
                    @slot('body')
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th class="text-center">Verificado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($records as $record)
                                        <tr>
                                            <td>{{ $record->id }}</td>
                                            <td>{{ $record->name }}</td>
                                            <td>{{ $record->email }}</td>
                                            <td class="text-center">
                                                <i class="material-icons">
                                                    {{ empty($record->verified_at) ? 'check_box_outline_blank' : 'check_box' }}
                                                </i>
                                            </td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('user.edit', $record->id) }}"
                                                   rel="tooltip"
                                                   class="btn btn-info btn-link"
                                                   data-original-title="Editar"
                                                   title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{ route('user.destroy', $record->id) }}"
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
                                            <td colspan="5">Nenhum registro encontrado </td>
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
    @include('components.buttons.new', ['route' => 'user.create'])
@endsection
