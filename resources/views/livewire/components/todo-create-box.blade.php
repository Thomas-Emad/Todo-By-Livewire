<div class="bg-white sm:w-full lg:w-1/2 rounded-lg p-2 box-shadow">
    <h1 class="font-bold text-xl">Add New Todo:</h1>
    <div class="flex items-center">
        <input type="text" wire:model="title"
            class="mt-1 mr-2 px-3 w-full py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1">
        <button wire:click="create"
            class=" px-3 py-2  rounded-md  text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Add</button>
    </div>
    @error('title')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>
