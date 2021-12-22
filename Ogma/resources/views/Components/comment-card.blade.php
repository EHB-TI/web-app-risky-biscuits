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
            @if (Auth::user()->id == $comment->author)
                <form id="form" method="POST" action="{{ route('comment.destroy') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $comment->id }}">
                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    <button
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd"
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </button>
                </form>
            @endif
        @endauth
    </div>
</div>
