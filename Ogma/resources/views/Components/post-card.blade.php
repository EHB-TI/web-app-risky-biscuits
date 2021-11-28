@props(['post'])
<?php
use App\Models\User;
?>
<a href="/post/{{ $post->id }}">
    <div class="pb-2 mb-2 ml-6">
        <h3 class="text-xl font-bold"> {{ $post->title }} </h3>
        <div class="ml-2">
            <p class="text-m pb-3"> {!! substr($post->message, 0, 220) !!} @if (strlen($post->message) > 220)...@endif </p>
            
            <div class="flex items-center">
                <!-- <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('images/profile/' . $post->Author->avatar) }}"
                    alt="Avatar of Writer"> -->
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">{{ $post->Author->name }}</p>
                    <p class="text-gray-600">{{ $post->dateOfPublication }}</p>
                </div>
            </div>
        </div>
        <hr class="mt-1" />
    </div>
</a>
