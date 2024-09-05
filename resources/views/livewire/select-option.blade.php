<div class="mt-3" wire:ignore>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-900 dark:text-white">{{ $name }}</label>
    <div class="mt-2">
        <select id="{{ $name }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
            <option value="" selected>--Please choose an {{ $name }}--</option>
            @foreach($options as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@assets
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endassets

@script
<script>
    $(document).ready(function() {
        $('#{{ $name }}').select2();

        $('label[for="{{ $name }}"]').on('click', function() {
            $('#{{ $name }}').select2('open');
        });

        $('#{{ $name }}').on('change', function(event) {
            $wire.$set('value', event.target.value)
        })
    });
</script>
@endscript