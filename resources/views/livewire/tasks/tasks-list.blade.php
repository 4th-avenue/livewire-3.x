<div class="space-y-4">
    <livewire:tasks.tasks-count :tasksByStatus="$this->tasksByStatus" />
    @if (true)
        @foreach ($this->tasks as $task)
            <div
                class="flex flex-col bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="flex flex-col justify-between p-4 leading-normal flex-grow w-full">
                    <div class="flex justify-between mb-4">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}</h5>
                        <span class="px-2 py-1 border border-slate-200 rounded-md">{{ $task->deadline->diffForHumans() }}</span>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                    <div class="flex space-x-2">
                        @foreach (App\Enums\StatusType::cases() as $case)
                            <button type="button" wire:click="changeStatus({{ $task->id }}, '{{ $case->value }}')"
                                @class([
                                    'inline-flex items-center px-4 py-2 bg-white border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
                                    $case->color() => true,
                                ])
                                {{ $case->value == $task->status->value ? 'disabled' : '' }}>
                                {{ Str::of($case->value)->headline() }}
                            </button type="button" class="">
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-4">
            {{ $this->tasks->links() }}
        </div>
    @endif
</div>
