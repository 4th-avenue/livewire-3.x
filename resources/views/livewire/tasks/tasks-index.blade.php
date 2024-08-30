<div class="py-12">
    <div class="max-w-7xl mx-auto flex sm:px-6 lg:px-8">
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
        <div class="w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit="save">
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input wire:model.live="form.title" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <div class="text-sm text-red-600 mt-2">
                                @error('form.title')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="mt-4">
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input wire:model.blur="form.slug" id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required autocomplete="slug" />
                            <div class="text-sm text-red-600 mt-2">
                                @error('form.slug')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea wire:model="form.description" id="description" rows="4" class="block mt-1 p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Leave a comment..." required></textarea>
                            <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select wire:model="form.status" id="status" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
                                <option>--Please choose an option--</option>
                                @foreach (\App\Enums\StatusType::cases() as $status)
                                    <option value="{{ $status->value }}">
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('form.status')" class="mt-2" />
                        </div>

                        <!-- Priority -->
                        <div class="mt-4">
                            <label for="priority" class="block text-sm font-medium text-gray-900 dark:text-white">Priority</label>
                            <select wire:model="form.priority" id="priority" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full mt-1 p-2.5">
                                <option>--Please choose an option--</option>
                                @foreach (\App\Enums\PriorityType::cases() as $priority)
                                    <option value="{{ $priority->value }}">
                                        {{ $priority->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('form.priority')" class="mt-2" />
                        </div>

                        <!-- Deadline -->
                        <div class="mt-4">
                            <x-input-label for="deadline" :value="__('Deadline')" />
                            <x-text-input wire:model="form.deadline" id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline')" required autocomplete="deadline" />
                            <x-input-error :messages="$errors->get('form.deadline')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Submit') }}
                                <div wire:loading>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-2 animate-spin">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </div>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
