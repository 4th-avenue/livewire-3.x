<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            <h1 class="text-2xl text-indigo-700 font-semibold">Livewire Example</h1>
            <livewire:select-option name="Country" :options="$countries" wire:model.live="selectedCountry" />
            @if(!is_null($selectedCountry))
                <livewire:select-option name="State" :options="$states" wire:model.live="selectedState" />
            @endif
            @if(!is_null($selectedState))
                <livewire:select-option name="City" :options="$cities" />
            @endif
        </div>
    </div>
</div>
