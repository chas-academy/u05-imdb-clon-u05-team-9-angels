@extends('layouts.app')
@section('title', 'Users')
@section('content')
<div class="container mx-auto px-4 pt-16">
    <button
        class="modal-open bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Create
        new</button>
    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Users
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Edit
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$user['name']}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{url('/dashboard/users/edit/'.$user->id)}}" class="border border-gray-200 bg-blue-400 text-gray-700 rounded-3xl px-4 py-2 transition 
                    duration-500 ease select-none hover:bg-blue-300 focus:outline-none focus:shadow-outline mt-5">
                        Edit
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Modal Section--}}
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-2xl font-bold">Create User</h3>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <form method="POST" action="/dashboard/users/edit/create">
                    @csrf
                    <div class="pb-6">
                        <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                        <div class="flex">
                            <input required type="text" id="name" name="name"
                                class="border-1  rounded-r px-4 py-2 w-full" type="text" />
                        </div>
                    </div>
                    <div class="pb-4">
                        <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
                        <input required id="email" type="email" name="email"
                            class="border-1  rounded-r px-4 py-2 w-full" type="email" />
                    </div>
                    <div class="pb-4">
                        <label for="password" class="font-semibold text-gray-700 block pb-1">Password</label>
                        <input required type="password" id="email" name="password"
                            class="border-1  rounded-r px-4 py-2 w-full" type="email" />
                    </div>
                    <div class="pb-4">
                        <label for="about" class="font-semibold text-gray-700 block pb-1">Role</label>
                        <select name="type" id="type" value="1">
                            <option value="0">Regular User</option>
                            <option value="1">Moderator</option>
                            <option value="2">Super User</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Create</button>
                    <a
                        class="modal-close bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded cursor-pointer">Close</a>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Section Ends--}}
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection