<div class="mt-3">
    <label for="{{$name}}" class="block text-sm font-medium text-gray-900 dark:text-white">{{ $name }}</label>
    <div class="mt-2">
        <select wire:model.live="value" id="{{ $name }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
            <option value="" selected>--Please choose an {{ $name }}--</option>
            @foreach($options as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
    </div>
</div>