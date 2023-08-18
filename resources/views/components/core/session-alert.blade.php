@props(['success' => 'true'])
<div id="alert-border-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)" @class([
    'text-green-800  border-green-300 bg-green-50 flex p-4 mb-4 w-[80%] md:w-1/4 fixed z-50 top-2 right-0' => $success,
    'text-red-800  border-red-300 bg-red-50 flex p-4 mb-4 w-[80%] md:w-1/4 fixed z-50 top-2 right-0' => !$success,
])
    role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ $slot }}
    </div>
    <button type="button" x-on:click="show=false" @class([
        'ml-auto -mx-1.5 -my-1.5  rounded-lg focus:ring-2 inline-flex h-8 w-8 bg-green-50 text-green-500 focus:ring-green-400 p-2 hover:bg-green-200' => $success,
        'ml-auto -mx-1.5 -my-1.5  rounded-lg focus:ring-2 inline-flex h-8 w-8 bg-red-50 text-red-500 focus:ring-red-400 p-2 hover:bg-red-200' => !$success,
    ])>
        <x-icons.close @class([
            'w-3 h-3 text-green-600 ml-0.5' => $success,
            'w-3 h-3 text-red-600 ml-0.5' => !$success,
        ]) />
    </button>
</div>
