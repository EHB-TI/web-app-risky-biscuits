@props(['users'])
<!-- News user -->
<div class="my-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="text-xl font-bold">Users</h1>
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="w-1/2">user</th>
                    <th class="w-1/2"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $counter = 0; ?>
                @foreach ($users as $user)
                <?php $counter++; ?>
                <tr class="@if ($counter % 2==0) bg-gray-200 @endif py-12">
                    <td>{{ $user->name }} </td>
                    <td>
                        <form method="post" action="{{ route('user.destroy', $user) }}">
                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class=" my-4 ml-4 py-2 px-4 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white border border-red-500 hover:border-transparent rounded">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <?php $counter++; ?>
            </tbody>

        </table>

        <x-auth-validation-errors class="mb-4" :errors="$errors->userStoreErrors" />
        <form method="POST" action="{{ route('user.post') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email -->
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <button class="ml-4  py-2 px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
    </div>
</div>