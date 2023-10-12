<?php

$categories = array('Account Management', 'Hardware', 'Photo/Video', 'Poster Request', 'Resources', 'Server', 'Voicemail', 'Website', 'WiFi', 'Printing');
$priorities = array('Low', 'Medium', 'High');
?>
<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <form action="/ticket/update/{{ $ticket->id }}" method="post">
            <h3 class="text-2xl font-bold text-center dark:text-white">Edit Ticket</h3>
            @if ($errors->all())

            @foreach ($errors->all() as $error)
                <p>🙅🏼‍♀️ {{ $error }}</p>
            @endforeach

            @endif
            @csrf
            <div class="mb-6">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input type="text" name="name" value="{{ $ticket->user->name }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-200 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <label for="assigned_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tech</label>
            <select name="assigned_to" class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme3 focus:border-theme3 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="{{ null }}">Unassigned</option>
                @foreach ($techs as $tech)
                <option {{ $tech == $ticket->tech ? 'selected' : '' }} value="{{ $tech->id }}">{{ $tech->name }}</option>
                @endforeach
            </select>

            <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
            <select name="priority" class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme3 focus:border-theme3 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($priorities as $priority)
                <option {{ $priority == $ticket->priority ? 'selected' : '' }} value="{{ $priority }}">{{ $priority }}</option>
                @endforeach
            </select>
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select name="category" class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme3 focus:border-theme3 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $category)
                <option {{ $category == $ticket->category ? 'selected' : '' }} value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Title</label>
                <input type="text" name="title" value="{{ $ticket->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme3 focus:border-theme3 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tell us more about your issue.</label>
                <textarea type="text" rows="3" name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-theme3 focus:border-theme3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $ticket->description }}</textarea>
            </div>
            <button type="submit" class="text-white bg-theme3 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-theme3 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
        </form>
    </x-card>
</x-layout>
