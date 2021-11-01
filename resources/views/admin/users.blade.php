@extends('layouts.admin.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Users</h3>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-800 uppercase tracking-wider">Id</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-800 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-800 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-800 uppercase tracking-wider">Joined</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>

                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $user['id'] }}</div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $user['name'] }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ $user['email'] }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ \Carbon\Carbon::parse($user['created_at'])->format('d-m-Y') }}</td>


                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <form action="{{ route('user.destroy', $user['id'])  }}" method="POST">
                                    @csrf
                                    <button class="text-indigo-600 hover:text-indigo-900 flex flex-row justify-center items-center" onclick="return confirm('Are you sure?')"><img src="{{ asset('/img/bin.png') }}" class="w-4 mr-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
