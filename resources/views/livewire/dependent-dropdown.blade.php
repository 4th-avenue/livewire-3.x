<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            <h1 class="text-2xl text-indigo-700 font-semibold">Livewire Example</h1>
            <div class="mt-3">
                <label for="country" class="block text-sm font-medium text-gray-900 dark:text-white">Country</label>
                <div class="mt-2">
                    <select wire:model.live="selectedCountry" id="country" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
                        <option value="" selected>--Please choose an country--</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if(!is_null($selectedCountry))
                <div class="mt-3">
                    <label for="state" class="block text-sm font-medium text-gray-900 dark:text-white">State</label>
                    <div class="mt-2">
                        <select wire:model.live="selectedState" id="state" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
                            <option value="" selected>--Please choose an state--</option>
                            @if($states)
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            @endif
            @if(!is_null($selectedState))
                <div class="mt-3">
                    <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <div class="mt-2">
                        <select id="city" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
                            <option value="" selected>--Please choose an city--</option>
                            @if($cities)
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
