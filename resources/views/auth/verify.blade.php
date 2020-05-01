@extends('layouts.auth')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('components.card-container', [
                           'title' => 'Verificação',
                           'category' => 'Por favor, verifique sua caixa de entrada'])
                    @slot('body')
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
