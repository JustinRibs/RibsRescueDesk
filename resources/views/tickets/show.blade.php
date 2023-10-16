@props(['ticket'])
{{-- Title / Posted By / Category / Assigned / priority --}}
<x-layout>

        @if (auth()->user()?->isAdmin && $ticket->assignedTo == null)
            <x-unassigned-alert :ticket='$ticket' />
        @endif
        <x-card class=" p-6 max-w-3xl mx-auto mt-24 grid grid-cols-8 grid-rows-1 bg-theme4">
            <div class="col-span-7 mb-4">
                <h1 class=" mb-1 text-xl">{{ $ticket->title }}</h1>
                <small class=" block mb-3"><a class=" font-semibold text-gray-900 underline decoration-theme3" href="#">{{ $ticket->user->name }}</a> | <a class="font-semibold text-gray-900 underline decoration-theme3" href="">{{ $ticket->category }}</a> {{ $ticket->created_at->format('m/d/y') }}</small>
                <small>This ticket has been assigned to <a href="" class=" text-theme1">{{ $ticket->assignedTo?->name ? $ticket->assignedTo->name : 'Nobody' }}</a></small>
                <p class=" text-sm">{{ $ticket->description }}</p>
            </div>
            <div class="ml-auto">
                <img class="w-6" src="/images/{{ $image = ($ticket->priority == 'low') ? 'mild.png' : (($ticket->priority == 'medium') ? 'medium.png' : 'Hot.png') }}" alt="">
            </div>
            <div class=" col-span-7">
                @foreach ($comments as $comment)
                <x-comment-card :comment='$comment'/>
                @endforeach

                @auth()
                <x-comments.create :ticket='$ticket' />
                @else
                <p>Please <a class=" font-semibold text-gray-900 underline decoration-theme3" href="/users/login">Login</a> to comment</p>
                @endauth

            </div>
        </x-card>
</x-layout>
