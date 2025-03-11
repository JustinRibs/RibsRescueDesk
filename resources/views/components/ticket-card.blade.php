{{-- alternate = bg-gray200 | bg-white --}}
@props(['ticket'])
<tr {{ $attributes->merge(['class' => 'border-b']) }} class="border-b ">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900">
        <a href="/ticket/{{ $ticket->id }}">{{  $ticket->title  }}</a>
    </th>
    <td class="px-6 py-4">
        {{ $ticket->user->name }}
    </td>
    <td class="px-6 py-4">
        {{ $ticket->category }}
    </td>
    <td class="px-6 py-4">

        {{ $ticket->assignedTo ? $ticket->assignedTo->name : '-' }}
    </td>
    <td class="px-6 py-4">
        <img class="w-7 ml-4" src="/images/{{ $image = ($ticket->priority == 'Low') ? 'low.png' : (($ticket->priority == 'Medium') ? 'med.png' : 'high.png')
    }}" alt="">
    </td>
    {{-- <td class="px-6 py-4"> --}}
        {{-- this will take you to show the ticket --}}
        {{-- <a href="/ticket/{{ $ticket->id }}" class="font-medium text-blue-600  hover:underline">Interact</a> --}}
    {{-- </td> --}}
</tr>
