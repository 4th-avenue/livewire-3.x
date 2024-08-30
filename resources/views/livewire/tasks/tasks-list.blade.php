<div class="w-7/12 space-y-4">
    @foreach ($tasks as $task)
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-4 leading-normal flex-grow">
                <div class="flex justify-between mb-4">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}
                    </h5>
                    <span
                        class="px-2 py-1 border border-slate-200 rounded-md">{{ $task->deadline->diffForHumans() }}</span>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
            </div>
        </a>
    @endforeach
</div>