<div class="form-group bmd-form-group">
    {!! Form::label($name, $label, ['class' => 'bmd-label-floating']) !!}
    {!! Form::number($name, $value ?? null, array_merge([
                    'class' => 'form-control',
                    'step' => '.01',
                    'autocomplete' => $name], $attributes ?? [])) !!}
    @error($name)
    <small id="{{ $name }}Help"
           class="form-text text-muted text-danger">
        {{ $message }}
    </small>
    @enderror
</div>