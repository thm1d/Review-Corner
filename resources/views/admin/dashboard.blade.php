@extends('admin.layout')

@section('content')
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full" x-data="{tab: location.hash.substring(1) || 0 }">
        <div class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0">
            <img src="{{asset('\img\profile_avatar.png')}}" class="rounded-full w-40 flex justify-self-center bg-gray-200">
            <nav class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:outline-none focus:shadow-outline active:bg-gray-200" @click.prevent="tab = 0;location.hash = 0" href="#0">Users</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline active:bg-gray-200" @click.prevent="tab = 1;location.hash = 1" href="#1">User Reviews</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" @click.prevent="tab = 2;location.hash = 2" href="#2">UC Top Up History</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" @click.prevent="tab = 3;location.hash = 3" href="#3">About</a>
            </nav>  
            <a href="{{ route('home.index') }}" class="text-right mr-2 mb-4 text-indigo-800 hover:text-blue-500"><--Back To Home</a>
        </div>
        <div class="mx-0 sm:mx-0 md:mx-2 lg:mx-4 xl:mx-4 my-4 text-white w-full">
            <div x-show="tab === 0" class="w-full">
                <table class="table-fixed text-white w-full">
                    <thead>
                        <tr class="text-lg font-semibold">
                            <th class="w-1/4">ID</th>
                            <th class="w-1/4">Name</th>
                            <th class="w-1/4">Email</th>
                            <th class="w-1/4">joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td class="py-2">{{ $user['id'] }}</td>
                                <td class="py-2">{{ $user['name'] }}</td>
                                <td class="py-2">{{ $user['email'] }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($user['created_at'])->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="tab === 1" class="w-full">
                <table class="table-fixed text-white w-full">
                    <thead>
                        <tr class="text-lg font-semibold">
                            <th class="w-1/6">ID</th>
                            <th class="w-1/6">Reviewed Item ID</th>
                            <th class="w-1/6">Category</th>
                            <th class="w-1/6">Writer</th>
                            <th class="w-1/6">Content</th>
                            <th class="w-1/6">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr class="text-center">
                                <td class="py-2">{{ $review['id'] }}</td>
                                <td class="py-2">{{ $review['item_id'] }}</td>
                                <td class="py-2">{{ $review['item_type'] }}</td>
                                <td class="py-2">{{ $review['user_id'] }}</td>
                                <td class="py-2">{{ $review['review'] }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($review['created_at'])->format('d-m-Y at h:m') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div x-show="tab === 2">
                <h3>This is Top Up Menu</h3>
            </div>
            <div x-show="tab === 3">
                <h3>This is About Menu</h3>
            </div>
        </div>
    </div>
@endsection