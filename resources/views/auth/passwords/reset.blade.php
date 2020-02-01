@extends('layouts.auth')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Reset de senha</h4>
                        <p class="card-category">
                            <b>Informe uma nova senha de acesso</b>
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden"
                                   name="token"
                                   value="{{ $token }}">
                            <div class="form-group bmd-form-group">
                                <label for="email" class="bmd-label-floating">E-mail</label>
                                <input id="email"
                                       type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ $email ?? old('email') }}"
                                       required
                                       autocomplete="email"
                                       autofocus>
                                @error('email')
                                <small id="emailHelp"
                                       class="form-text text-muted text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="password"
                                       class="bmd-label-floating">Senha</label>
                                <input id="password"
                                       type="password"
                                       class="form-control"
                                       name="password"
                                       required
                                       autocomplete="new-password">
                                @error('password')
                                <small id="passwordlHelp"
                                       class="form-text text-muted text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="password-confirm"
                                       class="bmd-label-floating">Confirmação de
                                    senha</label>
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password">
                            </div>
                            <div class="text-md-center mt-4">
                                <button type="submit"
                                        class="btn btn-primary">
                                    Alterar senha
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
