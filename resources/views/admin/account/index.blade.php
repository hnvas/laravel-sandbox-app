@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('components.card-container', [
                            'return'   => 'dashboard.index',
                            'title'    => trans_choice('models.account.class', 2),
                            'category' => trans('models.account.categories.index')])
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
                                                @include('components.buttons.edit', ['route' => route('account.edit', $record->id)])
                                                @include('components.buttons.destroy', ['route' => route('account.destroy', $record->id)])
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                {{ trans('messages.not_found') }}
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
    @include('components.buttons.new', ['route' => 'account.create'])
@endsection
