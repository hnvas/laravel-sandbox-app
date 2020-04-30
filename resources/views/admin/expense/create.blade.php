@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($expense, ['route' => 'expense.store']) }}
                @component('components.card-container', [
                            'return'   => 'expense.index',
                            'title'    => 'Despesas',
                            'category' => 'Nova despesa'])
                    @slot('body')
                        @include('admin.expense._form')
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
