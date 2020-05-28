@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($user, ['route' => 'user.store']) }}
                @component('components.card-container', [
                            'return'   => 'user.index',
                            'title'    => trans_choice('models.user.class', 2),
                            'category' => trans('models.user.categories.new')])
                    @slot('body')
                        @include('admin.user._form')
                    @endslot
                    @slot('footer')
                        @include('components.buttons.success', ['title' => 'Enviar'])
                    @endslot
                @endcomponent
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
