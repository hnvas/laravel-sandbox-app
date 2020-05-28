@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('components.card-container', [
                            'return'   => 'dashboard.index',
                            'title'    => trans_choice('models.user.class', 2),
                            'category' => trans('models.user.categories.index')])
                    @slot('body')
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('models.user.attributes.name') }}</th>
                                        <th>{{ trans('models.user.attributes.email') }}</th>
                                        <th class="text-center">{{ trans('models.user.attributes.verified_at') }}</th>
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
                                                    {{ empty($record->email_verified_at) ? 'check_box_outline_blank' : 'check_box' }}
                                                </i>
                                            </td>
                                            <td class="td-actions text-right">
                                                @include('components.buttons.edit', ['route' => route('user.edit', $record->id)])
                                                @include('components.buttons.destroy', ['route' => route('user.destroy', $record->id)])
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
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
    @include('components.buttons.new', ['route' => 'user.create'])
@endsection
