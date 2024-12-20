<div class="form-group  @error($field) error @enderror"">
    <div class=" form-label-group position-relative has-icon-left">
        <div class="controls">
            <input type="file" autocomplete="off" id="{{ $field }}"
                @isset($value) value="{{ old($field) ? old($field) : $value }}" @else value="{{ old($field) }}" @endisset
                class="form-control @isset($datepicker) pickadate-months-year picker__input @endisset" name="{{ $field }}"
                @isset($readonly) readonly @endisset" placeholder="{{ $label }}">
            <div class="form-control-position">
                <i class="{{ $icon }}"></i>
            </div>
            @error($field)
                <div class="help-block">
                    <ul role="alert">
                        <li>{{ $message }}</li>
                    </ul>
                </div>
            @enderror
        </div>
    </div>
</div>
