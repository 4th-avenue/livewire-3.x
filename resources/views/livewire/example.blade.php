<div x-data="{ shown: false }">
    <div class="p-4">
        @forelse ($countries as $country)
            <div>
                <h2 class="text-2xl font-semibold">{{ $country->name }}</h2>
                <span>{{ $country->id }}</span>
            </div>
        @empty
            <span>No countries yet</span>
        @endforelse
    </div>
    <div x-intersect.full="$wire.load()">
        <div class="w-full border-2 border-indigo-400"></div>
    </div>
</div>
