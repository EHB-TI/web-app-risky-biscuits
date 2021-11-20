<?php
use App\Models\User;
?>
<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-xl mb-2">{{ $post->title }}</h1>
                        <div class="flex">
                        <?php $user = $post->Author; ?>
                        <div class="flex items-center">
                            <!-- <img class="w-10 h-10 rounded-full mr-4"
                                src="{{ asset('images/profile/' . $user->avatar) }}" alt="Avatar of Writer"> -->
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">{{ $user->name }}</p>
                                <p class="text-gray-600">{{ $post->dateOfPublication }}</p>
                            </div>
                        </div>
                        @auth
                        @if (Auth::user()->id == $post->author)
                            <form method="GET" action="{{ route('post.edit', $post) }}">
                                <button type="submit"   
                                    class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white border border-green-500 hover:border-transparent rounded">
                                    {{ __('Edit') }}
                                </button>
                            </form>
                        @endif
                        @endauth
                        </div>
                    </div>
                    <p>{{ $post->message }}</p>
                </div>
            </div>

            @foreach($post->comments as $comment)

            <x-comment :comment="$comment" />

            @endforeach
            @auth
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2 w-11/12 mx-auto">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="mr-1">
                       <!-- <img class="w-10 h-10 rounded-full mr-4"
                            src="{{ asset('images/profile/' . Auth::user()->avatar) }}" alt="Avatar of user">
                            <p>{{ Auth::user()->name }}</p> -->
                    </div>
                    <div class="w-full">

                        <form id="form" method="POST" action="{{ route('comment.store') }}">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            @csrf
                            <textarea class="w-full" name="message"></textarea>
                            <input type="hidden" name="post" value="{{ $post->id}}" />
                            <input type="hidden" name="author" value="{{ Auth::user()->id}}" />
                            <button type="submit"
                                class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
                                {{ __('Post') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
