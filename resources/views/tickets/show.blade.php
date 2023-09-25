
{{-- Title / Posted By / Category / Assigned / priority --}}
<x-layout>
    <x-card class="p-6 max-w-3xl mx-auto mt-24 grid grid-cols-8 grid-rows-2 bg-theme4">
        <div class="col-span-7">
            <h1 class=" mb-1 text-xl">Where does it come from?</h1>
            <small class=" block mb-3"><a class=" text-theme3" href="#">Justin</a> | <a class="text-theme3" href="">Website Request</a> | 09-21 1:45 PM</small>
            <p class=" text-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="ml-auto">
            <img class="w-6" src="/images/mild.png" alt="">
        </div>
        <div class=" col-span-7">
            <x-comment-card/>
            <x-comments.create/>
        </div>
    </x-card>


</x-layout>
