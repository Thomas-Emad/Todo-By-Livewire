<div>
    <div class="flex items-center justify-center flex-col gap-3">
        @include('livewire.components.todo-create-box')
        <div class="bg-white sm:w-full lg:w-1/2 rounded-lg p-2 box-shadow">
            <div class="flex items-center justify-between gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

                <input type="text" wire:model.live="search"
                    class="mt-1 mr-2 px-3 w-full py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1">
            </div>
        </div>
        @include('livewire.components.todo-todos-box')
    </div>
</div>
