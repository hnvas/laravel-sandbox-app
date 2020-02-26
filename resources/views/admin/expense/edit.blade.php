@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('expense.update', $expense->id) }}" method="post">
                        @method('put')
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Despesas</h4>
                            <p class="card-category">Adicionar depesa</p>
                        </div>
                        <div class="card-body">
                            @include('admin.expense._form')
                        </div>
                        <div class="card-footer">
                            @include('layouts.components.buttons.submit', ['title' => 'Enviar'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
