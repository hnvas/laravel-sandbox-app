@extends('layouts.auth')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
            {!! Form::open(['route' => 'register']) !!}
                @component('components.card-container', [
                                'title'    => 'Registro',
                                'category' => 'Informe seus dados'])
                    @slot('body')
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                @include('components.fields.text', [
                                         'label' => 'Nome',
                                         'name' => 'name',
                                         'attributes' => ['required' => true]])
                            </div>
                            <div class="col-md-10">
                                @include('components.fields.email', [
                                         'label' => 'E-mail',
                                         'name' => 'email',
                                         'attributes' => ['required' => true]])
                            </div>
                            <div class="col-md-10">
                                @include('components.fields.password', [
                                         'label' => 'Senha',
                                         'name' => 'password',
                                         'attributes' => ['required' => true]])
                            </div>
                            <div class="col-md-10">
                                @include('components.fields.password', [
                                         'label' => 'Confirmação de senha',
                                         'name' => 'password_confirmation',
                                         'attributes' => ['required' => true]])
                            </div>
                        </div>
                    @endslot
                    @slot('footer')
                        <div class="ml-auto">
                            @include('components.buttons.success', ['title' => 'Enviar'])
                        </div>
                    @endslot
                @endcomponent
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
