<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">

        <form action="/ticket/create" method="post">
            <h3 class="text-2xl font-bold text-center dark:text-white">Create A Ticket</h3>
            @if ($errors->all())

            @foreach ($errors->all() as $error)
                <p>🙅🏼‍♀️ {{ $error }}</p>
            @endforeach

            @endif
            @csrf
            <div class="mb-6">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input type="text" name="name" value="{{  auth()->user()->name  }}" disabled class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-200 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
            <select name="priority" class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Select Priority</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            </select>
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select name="category" class="bg-gray-50 border mb-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Select Category</option>
            <option value="Account Management">Account Management</option>
            <option value="Hardware" >Hardware</option>
            <option value="Photo/Video">Photo/Video</option>
            <option value="Poster Request">Poster Request</option>
            <option value="Resources">Resources</option>
            <option value="Server">Server</option>
            <option value="Voicemail">Voicemail</option>
            <option value="Website">Website</option>
            <option value="WiFi">WiFi</option>
            <option value="Printing">Printing</option>
            <option value="Discrimination">Discrimination</option>
            </select>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Title</label>
                <input type="text" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tell us more about your issue.</label>
                <textarea type="text" rows="3" name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="text-white bg-theme3 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </x-card>
</x-layout>

{{-- 'Account Management', 'Hardware', 'Photo/Video', 'Poster Request', 'Resources', 'Server', 'Voicemail', 'Website', 'WiFi', 'Printing' --}}
