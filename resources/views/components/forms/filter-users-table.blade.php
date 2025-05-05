<div class="flex items-center space-x-3 w-full md:w-auto">
    <label for="{{ $id }}" class="sr-only">{{ $label }} :</label>
    <select wire:model.live="{{ $model }}" id="{{ $id }}">
        <option value="" selected>{{ $slot }}</option>
        @foreach ($options as $value => $option)
            <option value="{{ $value }}">{{ $option }}</option>
        @endforeach
    </select>
</div>