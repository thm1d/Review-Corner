@extends('layouts.app')

@section('content')

<div class="container mx-auto mb-4">
    <div class="your-ratings-container mx-0 md:mx-0 sm:mx-0 lg:mx-40 xl:mx-40 border-2 border-t-0 border-gray-600 h-auto min-h-screen text-white">
        <div class="mx-4 my-4 border border-opacity-25 border-gray-600 rounded-lg min-h-screen">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-4 my-4 px-2 py-4">My Profile</h2>
            <div class="info h-96 mx-4 bg-white text-gray-900 px-4 py-16 rounded-lg">
                <div class="name mx-4 py-4">
                    <dl class="">
                        <dt class="font-semibold text-lg">Name</dt>
                        <dd class="px-2 py-2 border bg-gray-300">{{ $user['name'] }}</dd>
                    </dl>
                </div>
                <div class="email mx-4 my-8">
                    <dl class="">
                        <dt class="font-semibold text-lg">Email</dt>
                        <dd class="px-2 py-2 border bg-gray-300">{{ $user['email'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection