<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Post
            </h2>
            <form action="{{ route('post.destroy', ['postId' => $post->id]) }}" method="post">
                @csrf
                <input type="hidden" name="postId" value="{{ $post->id}}" />
                <input type="hidden" name="userId" value="{{ Auth::user()->id}}" />
                <button
                    class="ml-4  py-2 px-4 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white border border-red-500 hover:border-transparent rounded">
                    {{ __('Delete') }}
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('post.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Titel -->
                        <div class="mt-4">
                            <x-label for="title" :value="__('Titel')" />

                            <input
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="title" class="block mt-1 w-full" type="text" name="title"
                                value="{{ $post->title }}" required autofocus />
                        </div>

                        <!-- Post message -->

                        <div class="mt-4">
                            <x-label for="message" :value="__('Post')" />

                            <textarea
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="message" name="message" rows="4">{{ $post->message }}</textarea>
                        </div>

                        <input type="hidden" name="author" value="{{ $post->author }}" />

                        <div class="flex items-center justify-end mt-4">
                            <input type="hidden" value="{{ $post->id }}" name="id">
                            <button
                                class="ml-4  py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>

    ClassicEditor
        .create( document.getElementById( 'message' ), {
            mediaEmbed: {
                previewsInData: true
            }
        } )
        .catch( error => {
            console.error( error );
        } );  

</script>