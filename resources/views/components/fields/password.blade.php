<div class="form-group bmd-form-group">
    {!! Form::label($name, $label, ['class' => 'bmd-label-floating']) !!}
    {!! Form::password($name, array_merge([
                    'class' => 'form-control',
                    'autocomplete' => $name], $attributes ?? [])) !!}
    @error($name)
        <small id="{{ $name }}Help"
               class="form-text text-muted text-danger">
            {{ $message }}
        </small>
    @enderror
    @if(!empty($resetLink) && Route::has('password.request'))
        <a class="btn btn-link float-right"
           href="{{ route('password.request') }}">
            {{ __('Esqueceu sua senha?') }}
        </a>
    @endif
</div>
