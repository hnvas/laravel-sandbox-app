<div class="form-group bmd-form-group">
    {!! Form::label($name, $label, ['class' => 'bmd-label-floating']) !!}
    {!! Form::email($name, $value ?? null, array_merge([
                    'class' => 'form-control',
                    'autocomplete' => $name], $attributes ?? [])) !!}
    @error($name)
        <small id="{{ $name }}Help"
               class="form-text text-muted text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
