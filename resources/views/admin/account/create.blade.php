@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($account, ['route' => 'account.store']) }}
                @component('components.card-container', [
                            'return'   => 'account.index',
                            'title'    => trans_choice('models.account.class', 2),
                            'category' => trans('models.account.categories.new')])
                    @slot('body')
                        @include('admin.account._form')
                    @endslot
                    @slot('footer')
                        @include('components.buttons.success', [
                                 'title' => trans('components.buttons.submit')])
                    @endslot
                @endcomponent
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
