<div class="bg-white sm:w-full lg:w-1/2 rounded-lg p-2 box-shadow">
    <ul role="list" class="divide-y divide-gray-100">
        @forelse ($todos as $todo)
            <li class="flex justify-between gap-x-6 py-5 rounded-lg p-1 @if ($todo->complate) bg-gray-200 @endif"
                wire:key="{{ $todo->id }}">
                <div class="flex min-w-0 gap-x-4">
                    <input type="checkbox" class="accent-green-500" wire:click="toggle({{ $todo->id }})"
                        @checked($todo->complate)>
                    <div class="min-w-0 flex-auto">
                        @if ($editTodoID == $todo->id)
                            <input wire:model="editTodoTitle"
                                class="mt-1 mr-2 px-3 w-full py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1">
                            @error('title')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        @else
                            <p
                                class="text-sm font-semibold leading-6 text-gray-900 @if ($todo->complate) line-through @endif">
                                {{ $todo->title }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $todo->created_at }}</p>
                        @endif
                    </div>
                </div>
                @if ($editTodoID == $todo->id)
                    <div>
                        <button class="bg-gray-500 text-white size-sm rounded-md px-2 py-1 text-sm hover:bg-gray-600"
                            wire:click="cancel">
                            Cancel
                        </button>
                        <button class="bg-green-500 text-white size-sm rounded-md px-2 py-1 text-sm hover:bg-green-600"
                            wire:click="update({{ $todo->id }})">
                            Save
                        </button>
                    </div>
                @else
                    <div>
                        <button wire:click="edit({{ $todo->id }})"
                            class="bg-yellow-500 text-gray-500 size-sm rounded-md px-2 py-1 text-sm hover:bg-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button class="bg-red-500 text-gray-500 size-sm rounded-md px-2 py-1 text-sm hover:bg-red-600"
                            wire:click="delete({{ $todo->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                @endif
            </li>
        @empty
            <li class="text-center py-2">No todo found</li>
        @endforelse
    </ul>
    {{ $todos->links() }}
</div>
