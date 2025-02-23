@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full p-2 mb-4 border rounded dark:bg-gray-900 dark:text-white dark:border-gray-700']) !!} 
    type="file" id="{{ $id ?? ''}}" name="{{ $name ?? ''}}" accept="{{ $accept ?? ''}}">