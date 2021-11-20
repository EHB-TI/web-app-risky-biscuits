@props(['comment'])
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2 w-11/12 mx-auto">
    <div class="p-6 bg-white border-b border-gray-200 flex">
        <div class="mr-1">
            <img class="w-10 h-10 rounded-full mr-4"
                src="{{ asset('images/profile/' . $comment->Author->avatar) }}" alt="Avatar of user">
                <p>{{ $comment->Author->name }}</p>
        </div>
        <p class="w-full">
            {{ $comment->message }}
        </p>
    </div>
</div>