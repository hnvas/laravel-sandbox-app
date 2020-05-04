@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($account, ['route' => 'account.store']) }}
                @component('components.card-container', [
                            'return'   => 'account.index',
                            'title'    => 'Contas',
                            'category' => 'Nova conta'])
                    @slot('body')
                        @include('admin.account._form')
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
