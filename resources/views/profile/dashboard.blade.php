@extends('layouts.app')

@section('content')

<div class="bg-gray-100">
 <div class="w-full text-white bg-gray-900">
    <div class="container mx-auto my-5 p-5" x-data="{ isOpen: false }">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="p-3 border-t-4 border-teal-600">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="{{ 'https://ui-avatars.com/api/?name=' . $user['name'] }}"
                            alt="profile_photo">
                    </div>
                    <h1 class="text-gray-200 font-bold text-xl leading-8 my-1">{{ $user['name'] }}</h1>
                    <ul
                        class="bg-gray-100 text-gray-900 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">{{ \Carbon\Carbon::parse($user['created_at'])->format('d-m-Y') }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm h-3/4 text-md">
                    <div class="flex justify-center mb-8 items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-800">
                        <div class="grid md:grid-cols-2">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2">{{ $userName[0] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2">{{ $userName[1] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{ $user['gender'] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{ $user['mobile'] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                <div class="px-4 py-2">{{ $user['current_address'] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                <div class="px-4 py-2">{{ $user['permanent_address'] }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{ $user['email'] }}">{{ $user['email'] }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{ $user['birthday'] }}</div>
                            </div>
                        </div>
                    </div>
                    <button
                        @click="isOpen = true"
                        class="block mt-8 w-full text-blue-800 text-xl font-semibold rounded-lg hover:bg-gray-300 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Update Details
                    </button>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- End of profile tab -->
            </div>
        </div>

        <template x-if="isOpen">
            <div class="mt-10 sm:mt-0 w-full mt-4 mx-2 text-gray-700">
              <div class="">
                <div class="flex justify-between">
                    <h3 class="text-lg font-medium leading-6 text-gray-200 mb-4">Personal Information</h3>
                    <button
                        @click="isOpen = false"
                        @keydown.escape.window="isOpen = false"
                        class="text-3xl font-medium leading-6 text-gray-200 mb-4 hover:text-gray-400">&times;
                    </button>
                </div>
                <div class="mt-5 md:mt-0 ">
                  <form action="{{ route('user.update', $user['id']) }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                      <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $userName[0] }}"autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $userName[1] }}" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>

                          <div class="col-span-6 sm:col-span-4">
                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input type="email" name="email_address" id="email_address" value="{{ $user['email'] }}" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select id="gender" name="gender" autocomplete="gender" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $user['gender'] }}">
                              <option class="text-gray-800" value="Male">Male</option>
                              <option class="text-gray-800" value="Female">Female</option>
                              <option class="text-gray-800" value="Others">Others</option>
                            </select>
                          </div>

                          <div class="col-span-6">
                            <label for="current_address" class="block text-sm font-medium text-gray-700">Current Address</label>
                            <input type="text" name="current_address" id="current_address" value="{{ $user['current_address'] }}"autocomplete="current-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>

                          <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="permanent_address" class="block text-sm font-medium text-gray-700">Permanent Address</label>
                            <input type="text" name="permanent_address" id="permanent_address" value="{{ $user['permanent_address'] }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                            <input type="text" name="birthday" id="birthday" value="{{ $user['birthday'] }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="dd/mm/yy">
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                            <input type="tel" name="mobile" id="mobile" pattern="[0-9]{11}" value="{{ $user['mobile'] }}" autocomplete="mobile" placeholder="01781939372" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Save
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </template>
    </div>
</div>
@endsection