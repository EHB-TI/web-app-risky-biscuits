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
                                <button type="submit" class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white border border-green-500 hover:border-transparent rounded">
                                    {{ __('Edit') }}
                                </button>
                            </form>
                            @elseif(is_null(App\Models\Subscription::where('post', $post->id)->where('subscriber', Auth::user()->id)->first()))

                            <form method="POST" action="{{ route('subscription.store', ['post' => $post->id, 'subscriber' => Auth::user()->id, 'email' => Auth::user()->email] ) }}">
                                @csrf
                                <button type="submit" class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white border border-green-500 hover:border-transparent rounded">
                                    {{ __('Subscribe') }}
                                </button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('subscription.destroy', ['post' => $post->id, 'subscriber' => Auth::user()->id]) }}">
                                @csrf
                                <button type="submit" style="background-color:rgb(200,0,0);color:white;" class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white border border-green-500 hover:border-transparent rounded">
                                    {{ __('Unsubscribe') }}
                                </button>
                            </form>
                            @endif
                            @if(Auth::user() && Auth::user()->hasRole("ROLE_ADMIN"))
                            <form action="{{ route('post.destroy', ['postId' => $post->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="postId" value="{{ $post->id}}" />
                                <input type="hidden" name="userId" value="{{ Auth::user()->id}}" />
                                <button class="ml-4  py-2 px-4 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white border border-red-500 hover:border-transparent rounded">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                            @endif
                            @endauth


                        </div>
                    </div>
                    <p>{!! $post->message !!}</p>

                    <p id='Congrats' hidden='true' style="color:green;">Correct, Good Job :)</p>
                    <p id='Ohno' hidden='true' style="color:red;">Wrong, Bad Job >:(</p>
                    <p><b>{{ $task->question }}</b></p>
                    <?php
                    $first = '<input type="radio" id="Answer1" name="Answers" value="1"><label for="Answer1">' . $task->answer1 . '</label><br>';
                    $second = '<input type="radio" id="Answer2" name="Answers" value="0"><label for="Answer2">' . $task->answer2 . '</label><br>';
                    $third = '<input type="radio" id="Answer3" name="Answers" value="0"><label for="Answer3">' . $task->answer3 . '</label><br>';
                    $rand = rand(1, 3);
                    switch ($rand) {
                        case 1:
                            echo $first;
                            echo $second;
                            echo $third;
                            break;
                        case 2:
                            echo $second;
                            echo $third;
                            echo $first;
                            break;
                        case 3:
                            echo $third;
                            echo $first;
                            echo $second;
                            break;
                    }
                    ?>
                    <button class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded" id='submitBtn'>Submit</button>
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
                            <button type="submit" class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
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
<script>
    window.onload = () => {
        var submitBtn = document.getElementById('submitBtn');
        submitBtn.addEventListener("click", Submit);
    }

    function Submit() {
        console.log('clicked');
        var radioButtons = document.getElementsByName('Answers');
        var congrats = document.getElementById('Congrats');
        var ohno = document.getElementById('Ohno');

        congrats.hidden = true;
        ohno.hidden = true;
        for (var btn of radioButtons) {
            if (btn.checked) {
                if (btn.value == 1)
                    congrats.hidden = false;
                else
                    ohno.hidden = false;
            }
        }
    }
</script>