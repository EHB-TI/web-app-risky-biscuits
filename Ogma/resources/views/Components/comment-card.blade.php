@props(['comment'])
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2 w-11/12 mx-auto">
    <div class="p-6 bg-white border-b border-gray-200 flex">
        <div class="mr-1">
            <p>{{ $comment->Author->name }}</p>
        </div>
        @auth
            @if (str_contains($comment->message, '@' . Auth::user()->name))
                <p class="w-full" style="color:red">
                    {{ $comment->message }}
                </p>
            @else
                <p class="w-full">
                    {{ $comment->message }}
                </p>
            @endif
        @endauth
    </div>
</div>
