@props(['topic', 'posts'])

<h1 class="text-4xl font-bold">{{ $topic->name }}</h1>
<hr/>

@foreach($topic->Posts->sortByDesc('dateOfPublication') as $post)
 <x-post-card :post="$post" />
@endforeach