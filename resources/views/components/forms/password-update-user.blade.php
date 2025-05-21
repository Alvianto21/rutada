@props(['name', 'type', 'id', 'placeholder', 'label', 'user'])
<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" aria-label="{{ $label }}" for="{{ $name }}">{{ $slot }}</label>
<input type="{{ $type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
@error($name)
	<div class="text-sm text-red-600 dark:text-red-500 mt-2">
		{{ $message }}
	</div>
@enderror