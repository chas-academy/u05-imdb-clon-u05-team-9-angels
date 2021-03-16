@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <h1 class="tracking-wider text-2xl font-semibold">Users</h1>
    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
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
</div>
@endsection