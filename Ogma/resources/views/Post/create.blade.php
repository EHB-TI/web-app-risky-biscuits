<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf
            
                        <!-- Titel -->
                        <div>
                            <x-label for="title" :value="__('Titel')" />
            
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <!-- Post message -->

                        <div class="mt-4">
                            <x-label for="message" :value="__('Post')" />
            
                            <textarea class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="message" name="message" rows="4"></textarea>
                        </div>                       

                        <!-- Task -->
                        <div>
                            <x-label for="quesion" :value="__('Multiple Choice Question')" />
                            <x-input type="text" id="question" name="question" /><br>
                            <x-label for="answer1" :value="__('Answer 1 (this will be the correct answer): ') " />
                            <x-input type="text" id="answer1" name="answer1" /><br>
                            <x-label for="answer2" :value="__('Answer 2: ')" />
                            <x-input type="text" id="answer2" name="answer2" /><br>
                            <x-label for="answer3" :value="__('Answer 3: ')" />
                            <x-input type="text" id="answer3" name="answer3" /><br>
                        </div>
                        
                        <!-- topic -->
                        <select class="block mt-4 w-full rounded-md shadow-sm border-gray-300" name="topic">
                            <option value="">{{ __('topic') }}</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" @if($topic->id == old('topic')) selected @endif>{{ $topic->name }}</option>
                            @endforeach
                        </select> 

                        <input id="author" value="{{ Auth::user()->id }}" type="hidden" name="author" required />

                        <div class="flex items-center justify-end mt-4">          
                            <button class="ml-4  py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
                                {{ __('Post') }}
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