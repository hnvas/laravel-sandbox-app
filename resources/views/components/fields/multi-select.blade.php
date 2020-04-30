<div class="form-group">
    {{ Form::select("{$name}[]", $collection, $selected, array_merge([
                    'title' => $label,
                    'class' => 'form-control custom-select',
                    'multiple' => true,
                    'data-selected' => $selected])) }}
    @error($name)
        <small id="tagsHelp"
               class="form-text text-muted text-danger">
            {{ $message }}
        </small>
    @enderror
</div>