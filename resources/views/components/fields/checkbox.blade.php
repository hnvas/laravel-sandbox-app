<div class="form-group">
    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input"
                   type="checkbox"
                   name="{{ $name }}"
                   id="{{ $name }}"
                    {{ $checked ? 'checked' : '' }}>
            {{ $label }}
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
        </label>
    </div>
</div>
