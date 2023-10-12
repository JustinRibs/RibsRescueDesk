<x-card class=" max-w-2xl mt-1 mb-2 grid grid-cols-3 bg-gray-400 h-auto">
    <div class="col-span-2">
        <p class=" text-sm">{{ $comment->body }}</p>
    </div>
    <div class="ml-auto">
        {{-- <h1 class="bg-gray-600 rounded-xl px-4 text-white text-center">{{ $comment->user->name }}</h1> --}}
        {{-- <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $comment->user->name }}</span> --}}
        <span class="bg-green-100 text-theme3 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $comment->user->name }}</span>
    </div>
</x-card>
