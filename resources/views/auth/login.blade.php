@extends('layouts.auth')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {!! Form::open(['route' => 'login']) !!}
                @component('components.card-container', [
                           'title' => 'Login',
                           'category' => 'Informe seus dados de acesso'])
                    @slot('body')
                        <div class="row justify-content-center">
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
                                           'resetLink' => true,
                                           'attributes' => ['required' => true]])
                                @include('components.fields.checkbox', [
                                         'label' => 'Lembre-se de min',
                                         'name' => 'remember',
                                         'checked' => old('remember')])
                            </div>
                        </div>
                    @endslot
                    @slot('footer')
                        <div class="ml-auto">
                            @include('components.buttons.success', ['title' => 'Login'])
                        </div>
                    @endslot
                @endcomponent
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
