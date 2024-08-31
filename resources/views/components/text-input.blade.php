@props(['disabled' => false])


<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 rounded-md shadow-sm focus:border-green-800 focus:ring-green-800',
]) !!}>




