@props([
    'value' => null,
    'selected' => false,
])

<option
    {{ $attributes }}
    @if (isset($value)) value="{{ $value }}" @endif
    @if (isset($value)) wire:key="{{ $value }}" @endif
    @if ($selected) selected @endif
>{{ $slot }}</option>