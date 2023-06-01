<select id="{{ $id }}" name="{{ $name }}" class="{{ $class }}">
    @foreach ($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" {{ $optionValue == $value ? 'selected' : '' }}>
            {{ $optionLabel }}
        </option>
    @endforeach
</select>