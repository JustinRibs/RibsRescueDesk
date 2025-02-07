<x-layout>

<?php
    // $tickets = [
    //     [
    //         'title' => 'bruh',
    //         'posted_by' => 'joe',
    //         'category' => 'wifi',
    //         'priority' => 'low',
    //         'assigned_to' => 'justin',
    //     ],
    //     [
    //         'title' => 'other bruh',
    //         'posted_by' => 'anthony',
    //         'category' => 'poster',
    //         'priority' => 'medium',
    //         'assigned_to' => 'nobody'
    //     ],
    //     [
    //         'title' => 'final bruh',
    //         'posted_by' => 'barbs',
    //         'category' => 'i dont know',
    //         'priority' => 'high',
    //         'assigned_to' => 'jarred',
    //     ],

    // ]
?>

    <x-search/>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-11 mx-11">
    @if (!auth()->check())
            <x-login-alert />
        @endif
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-theme3 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Posted By
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Assigned
                </th>
                <th scope="col" class="px-6 py-3">
                    Priority
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @php
                $toggle = false;
            @endphp

            @foreach ($tickets as $ticket)
                <x-ticket-card :ticket="$ticket" class="{{ $toggle ? 'bg-white' : 'bg-gray-200' }}" />
            @php
                $toggle = !$toggle
            @endphp
            @endforeach

        </tbody>

    </table>


</div>


{{ $tickets->links() }}


</x-layout>
