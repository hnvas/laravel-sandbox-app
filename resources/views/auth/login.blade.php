@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Login</h4>
                        <p class="card-category">
                            <b>Informe seus dados para acessar</b>
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">E-mail</label>
                                <input id="email" type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email">
                                @error('email')
                                <small id="emailHelp"
                                       class="form-text text-muted text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group bmd-form-group mt-4">
                                <label class="bmd-label-floating">Senha</label>
                                <input id="password" type="password"
                                       class="form-control"
                                       name="password" required
                                       autocomplete="current-password">
                                @error('password')
                                <small id="passwordHelp"
                                       class="form-text text-muted text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link float-right"
                                       href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Lembre-se de min') }}
                                        <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
