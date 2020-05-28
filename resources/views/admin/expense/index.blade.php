@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('components.card-container', [
                            'return'   => 'dashboard.index',
                            'title'    => trans_choice('models.expense.class', 2),
                            'category' => trans('models.expense.categories.index')])
                    @slot('body')
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('models.expense.attributes.description') }}</th>
                                        <th>{{ trans('models.expense.attributes.amount') }}</th>
                                        <th>{{ trans('models.expense.attributes.issue_date') }}</th>
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
                                                @include('components.buttons.edit', ['route' => route('expense.edit', $record->id)])
                                                @include('components.buttons.destroy', ['route' => route('expense.destroy', $record->id)])
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
                    @slot('footer')
                        <div class="ml-auto">
                            {{ $records->render() }}
                        </div>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
    @include('components.buttons.new', ['route' => 'expense.create'])
@endsection
