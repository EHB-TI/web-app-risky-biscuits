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
                            <img class="w-10 h-10 rounded-full mr-4"
                                src="{{ asset('images/profile/' . $user->avatar) }}" alt="Avatar of Writer">
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
                        @endif
                        </div>
                    </div>
                    <p>{{ $post->message }}</p>
                    @auth
                    @if($post->likes->contains(Auth::user()->id))
                    <form action="{{ route('unlike') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                          </svg>
                          {{ count($post->likes->all()) }}
                      </button>
                    </form>
                    @else
                    <form action="{{ route('like') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                          </svg>
                          {{ count($post->likes->all()) }}
                      </button>
                    </form>
                    @endif
                    @else
                    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                          </svg>
                          {{ count($post->likes->all()) }}
                      </button>
                    @endif
                </div>
            </div>

            @foreach($post->comments as $comment)

            <x-comment :comment="$comment" />

            @endforeach
            @auth
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2 w-11/12 mx-auto">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="mr-1">
                        <img class="w-10 h-10 rounded-full mr-4"
                            src="{{ asset('images/profile/' . Auth::user()->avatar) }}" alt="Avatar of user">
                            <p>{{ Auth::user()->name }}</p>
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
