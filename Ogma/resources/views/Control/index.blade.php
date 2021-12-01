<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Control
            </h2>
        </div>
    </x-slot>

    @if(Auth::user() && Auth::user()->hasRole("ROLE_ADMIN"))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <form method="GET" action="{{ route('control.createRole') }}">
                    <button class="ml-4  py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
                        {{ __('New Role') }}
                    </button>
                </form>

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">Nr.</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td class="border px-4 py-2">{{ $role->id }}</td>
                            <td class="border px-4 py-2">{{ $role->name }}</td>
                            <td class="border px-4 py-2">
                                @if(!$role->canDelete)
                                <form method="POST" action="{{ route('control.deleteRole', ['roleId' => $role->id]) }}" enctype="multipart/form-data" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <input id="author" value="{{ Auth::user()->id }}" type="hidden" name="author" required />
                                    <button class="ml-4  py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">Delete</button>
                                </form>
                                @endif

                                <form method="POST" action="{{ route('control.editRole', ['roleId' => $role->id]) }}" enctype="multipart/form-data" style="display: inline;">
                                    @method('POST')
                                    @csrf
                                    <input id="author" value="{{ Auth::user()->id }}" type="hidden" name="author" required />
                                    <button class="ml-4  py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">Edit</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div style="width: 100%; margin-top: 10px;"></div>

            <x-topic-editor :topics="$topics" />

            <div style="width: 100%; margin-top: 10px;"></div>

            <x-user-editor :users="$users" />

        </div>
    </div>
    @endif
</x-app-layout>