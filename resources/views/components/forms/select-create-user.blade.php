@props(['name', 'options', 'id', 'label'])
<label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }} :</label>
<select name="{{ $name }}" id="{{ $id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" {{ $attributes }}>
    <option value="" selected disabled>{{ $slot }}</option>
    @foreach ($options as $value => $option)
        <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>{{ $option }}</option>
    @endforeach
</select>
@error($name)
    <div class="text-sm text-red-600 dark:text-red-500 mt-2">
        {{ $message }}
    </div>
@enderror