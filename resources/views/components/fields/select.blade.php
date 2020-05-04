<div class="form-group">
        @php $multiSelect = !empty($multiple); @endphp
        {{ Form::select($multiSelect ? "{$name}[]" : $name, $collection, $selected, array_merge([
                        'title' => $label,
                        'class' => 'form-control custom-select',
                        'multiple' => $multiSelect,
                        'data-selected' => $selected])) }}
        @error($name)
        <small id="tagsHelp"
               class="form-text text-muted text-danger">
                {{ $message }}
        </small>
        @enderror
</div>