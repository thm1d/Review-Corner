@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center h-auto my-16 bg-gray-900">
	    <div class="container">
	    	<div class="tab bg-gray-800 mx-0 sm:mx-0 md:mx-10 lg:mx-40 xl:mx-40 px-8 py-8 my-8 border border-gray-700 rounded-lg shadow-lg h-auto">
		    	<div x-data="{tab: 0 }" class="h-auto pb-10 mb-2">
				    <div class="flex border border-gray-800 overflow-hidden">

				        <button class="px-4 py-2 w-full" x-bind:class="{'bg-gray-900 text-white': tab === 0}" @click.prevent="tab = 0;window.location.hash = 0" href="#">Facilities</a></button>
				        <button class="px-4 py-2 w-full" x-bind:class="{'bg-gray-900 text-white': tab === 1}" @click.prevent="tab = 1;window.location.hash = 1" ><a href="#">Method</a></button>
				        <button class="px-4 py-2 w-full" x-bind:class="{'bg-gray-900 text-white': tab === 2}" @click.prevent="tab = 2;window.location.hash = 2" ><a href="#">Form</a></button>
				        <button class="px-4 py-2 w-full" x-bind:class="{'bg-gray-900 text-white': tab === 3}" @click.prevent="tab = 3;window.location.hash = 3" ><a href="#">FAQ</a></button>
				 
				    </div>
				    <div class="bg-gray-900 bg-opacity-10 border border-gray-800 h-auto mb-8">
				        <div class="p-4 space-y-2" x-show="tab === 0"
				            x-transition:enter="transition ease-out duration-300"
				            x-transition:enter-start="opacity-0 transform scale-90"
				            x-transition:enter-end="opacity-100 transform scale-100">
				            <div class="flex flex-wrap justify-between my-8 px-1 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4">
				            	<div class="silver w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
				            		<h1 class="text-center font-semibold text-lg my-2">SILVER (200 UC)</h1>
				            		<h2>* Feature 1</h2>
					            	<h2>* Feature 2</h2>
				            	</div>
				            	<div class="gold w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
				            		<h1 class="text-center font-semibold text-lg my-2">GOLD (300 UC)</h1>
				            		<h2>* Feature 1</h2>
					            	<h2>* Feature 2</h2>
					            	<h2>* Feature 3</h2>
				            	</div>
				            	<div class="platinum w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
				            		<h1 class="text-center font-semibold text-lg my-2">PLATINUM (500 UC)</h1>
				            		<h2>* Feature 1</h2>
					            	<h2>* Feature 2</h2>
					            	<h2>* Feature 3</h2>
					            	<h2>* Feature 4</h2>
				            	</div>
				            	<div class="diamond w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
				            		<h1 class="text-center font-semibold text-lg my-2">DIAMOND (800 UC)</h1>
				            		<h2>* Feature 1</h2>
					            	<h2>* Feature 2</h2>
					            	<h2>* Feature 3</h2>
					            	<h2>* Feature 4</h2>
					            	<h2>* Feature 5</h2>
				            	</div>
				            </div>
				            
				        </div>
				        <div class="p-4 space-y-2" x-show="tab === 1"
				            x-transition:enter="transition ease-out duration-300"
				            x-transition:enter-start="opacity-0 transform scale-90"
				            x-transition:enter-end="opacity-100 transform scale-100">
				            <div class="my-8 px-1 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4 flex flex-col justify-center">
				            	<div class="flex justify-center items-center bg-gray-800 w-min h-auto py-8">
				            		<div class="flex flex-col justify-center items-center">
				            			<img src="{{ asset('\img\application_logo.png') }}">
				            			<h3 class="">UC Top Up</h3>
				            		</div>
				            	</div>
			            		<div class="flex flex-col justify-center items-center mt-8 text-red-500">
			            			<p>Please top up UC(Unknown Cash) from your nearest Review Corner outlet or contact any admin for online top up.   </p><br>
			            			<p>In case of Rank Downgrade, 50% UC will be returned to your account.</p>
			            		</div>
				            	
				            </div>
				        </div>
				        <div class="p-4 space-y-2" x-show="tab === 2"
				            x-transition:enter="transition ease-out duration-300"
				            x-transition:enter-start="opacity-0 transform scale-90"
				            x-transition:enter-end="opacity-100 transform scale-100">
				            <div class="my-8 px-0 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4 flex flex-col justify-center">
				            	<div class="bg-gray-800 h-auto py-4">
				            		@unless(Auth::check())
				            			<h3 class="px-2 flex justify-center">Please <a href="{{ route('login') }}" class="text-blue-300 hover:text-blue-600">&nbsp Login &nbsp</a> to access this feature.</h3>
				            		@endunless
				            		@auth
					            	<h3 class="flex justify-end mr-4 py-1">Balance: {{Auth::user()->balance}} UC</h3>
					            	<h3 class="flex justify-end mr-4 py-1">Current Rank: {{ ucfirst(Auth::user()->rank) }}</h3>
					            	<form x-data="{member:'0'}" method="POST" action="{{route('rank.update')}}" class="flex flex-col px-0 sm:px-0 md:px-4 lg:px-8 xl:px-8 justify-center items-center">
					            		@csrf
					            		<label class="mx-1 sm:mx-0 md:mx-2 xl:mx-4 lg:mx-4 mt-4 px-2 py-2 text-lg font-semibold">Email</label>
					            		<input type="email" name="email" class="bg-gray-900 border border-gray-700 mx-1 sm:mx-0 md:mx-2 xl:mx-4 lg:mx-4 mt-2 px-2 py-2 w-full sm:w-full md:w-3/5 xl:w-2/5 lg:w-2/5 rounded-lg" value="{{Auth::user()->email}}" required>
										<select x-model="member" name="rank" id="program" class="bg-gray-900 mx-1 sm:mx-0 md:mx-2 xl:mx-4 lg:mx-4 my-4 px-2 py-2 w-full sm:w-full md:w-3/5 xl:w-2/5 lg:w-2/5 text-center rounded-lg border-gray-700" required>
										    <option selected="select" value="0" class="font-semibold" disabled>-- Select a Membership Program --</option>
										    <option value="200">Silver</option>
										    <option value="300">Gold</option>
										    <option value="500">Platinum</option>
										    <option value="800">Diamond</option>
										</select>
										<div class="mx-1 sm:mx-0 md:mx-2 xl:mx-4 lg:mx-4 my-4">
											<label class="px-2 py-2 my-2 font-semibold text-lg">Amount :</label>
											<span x-text="member" class="ml-1 w-2/5"></span> UC
										</div>
										<button  type="submit" class="self-center px-4 py-2 bg-transparent border border-green-500 rounded-lg hover:text-gray-900 hover:bg-gray-400 hover:border-blue-700">Submit</button>
										
					            	</form>
					            	@endauth
					            	
				            	</div>
				            </div>
				        </div>
				        <div class="p-4 space-y-2" x-show="tab === 3"
				            x-transition:enter="transition ease-out duration-300"
				            x-transition:enter-start="opacity-0 transform scale-90"
				            x-transition:enter-end="opacity-100 transform scale-100">
				            <div class="my-8 px-1 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4 flex flex-col justify-center">
				            	<div class="">
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">Why become a member?</h3>
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">I want to become a member? What to do?</h3>
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">Where can I find the location of review corner outlet?</h3>
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">Why can't I top up throgh outlet?</h3>
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">Where can I find the rules & regulations?</h3>
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">Do you have any user manual?</h3>
				            		<h3 class="border border-gray-800 bg-black px-4 py-2 shadow-lg hover:text-gray-400">Where is the prize list?</h3>
				            	</div>
				            </div>
				        </div>
				    </div>
				</div>
				@if ($message = Session::get('message'))
					<div class="fixed inset-x-0 bottom-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end lg:justify-center xl:justify-center z-50">
					    <div 
					      x-data="{ show: false }"
					          x-init="() => {
					            setTimeout(() => show = true, 500);
					            setTimeout(() => show = false, 5000);
					          }"
					      x-show="show" 
					      x-description="Notification panel, show/hide based on alert state." 
					      @click.away="show = false" 
					      x-transition:enter="transition ease-out duration-300"
					      x-transition:enter-start="opacity-0 transform scale-90"
					      x-transition:enter-end="opacity-100 transform scale-100"
					      x-transition:leave="transition ease-in duration-300"
					      x-transition:leave-start="opacity-100 transform scale-100"
					      x-transition:leave-end="opacity-0 transform scale-90"
					        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
					      <div class="rounded-lg shadow-xs overflow-hidden">
					        <div class="p-4">
					          <div class="flex items-start">
					            
					            <div class="ml-3 w-0 flex-1 pt-0.5">
					              <p class="text-sm leading-5 font-medium text-gray-900">
					                {{ $message }}
					              </p>
					            </div>
					            <div class="ml-4 flex-shrink-0 flex">
					              <button @click="show = false" class="inline-flex text-gray-600 focus:outline-none focus:text-gray-700 transition ease-in-out duration-150">
					                X
					              </button>
					            </div>
					          </div>
					        </div>
					      </div>
					    </div>
					</div>
				@endif
			</div>
	    </div>
    </div>
    
@endsection