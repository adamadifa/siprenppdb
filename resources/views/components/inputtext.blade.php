<div class="form-group   @error($field) error @enderror" style="margin-bottom: 0px !important; margin-top:0px !important">
    <div class=" form-label-group position-relative has-icon-left mb-1">
        <div class="controls">
            <input type="text" autocomplete="off" id="{{ $field }}"
                @isset($value) value="{{ old($field) ? old($field) : $value }}" @else value="{{ old($field) }}" @endisset
                class="form-control @isset($datepicker) pickadate-months-year picker__input @endisset" name="{{ $field }}"
                @isset($readonly) readonly @endisset" placeholder="{{ $label }}">
            <div class="form-control-position">
                <i class="{{ $icon }}"></i>
            </div>
            @error($field)
            @enderror
        </div>
    </div>
</div>
