@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center h-auto my-16 bg-gray-900">
	    <div class="container">
	    	<div class="tab bg-gray-800 mx-0 sm:mx-0 md:mx-10 lg:mx-40 xl:mx-40 px-8 py-8 my-8 border border-gray-700 rounded-lg shadow-lg h-auto">
		    	<div x-data="{active: 0}" class="h-auto pb-10 mb-2">
				    <div class="flex border border-gray-800 overflow-hidden">
				        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 0" x-bind:class="{'bg-gray-900 text-white': active === 0}">Facilities</button>
				        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1" x-bind:class="{'bg-gray-900 text-white': active === 1}">Method</button>
				        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 2" x-bind:class="{'bg-gray-900 text-white': active === 2}">Form</button>
				        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 3" x-bind:class="{'bg-gray-900 text-white': active === 3}">FAQ</button>
				    </div>
				    <div class="bg-gray-900 bg-opacity-10 border border-gray-800 h-auto mb-8">
				        <div class="p-4 space-y-2" x-show="active === 0"
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
				        <div class="p-4 space-y-2" x-show="active === 1"
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
			            		<div class="flex justify-center items-center mt-8 text-red-500">
			            			<p>Please top up UC(Unknown Cash) from your nearest Review Corner outlet or contact any admin for online top up.   </p>
			            		</div>
				            	
				            </div>
				        </div>
				        <div class="p-4 space-y-2" x-show="active === 2"
				            x-transition:enter="transition ease-out duration-300"
				            x-transition:enter-start="opacity-0 transform scale-90"
				            x-transition:enter-end="opacity-100 transform scale-100">
				            <div class="my-8 px-1 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4 flex flex-col justify-center">
				            	<div class="bg-gray-800">
					            	<h3 class="flex justify-end mr-4 py-8">Balance: 1000 UC</h3>
					            	<form method="POST" action="{{route('member.store')}}">
					            		@csrf
					            		<div x-data="{ open: false }">
										    <button @click="open = true" class="bg-gray-900 ml-4 my-4 px-2 py-2">-- Select a Membership Program --</button>

										    <ul
										        x-show="open"
										        @click.away="open = false"
										    >
										        <li>Silver</li>
										        <li>Gold</li>
										        <li>Platinum</li>
										        <li>Diamond</li>
										    </ul>
										</div>
										<input class="bg-transparent border border-gray-700 ml-4 my-4 px-2 py-2 rounded-sm" type="text" name="price" value="500 UC" disabled><br>
					            	</form>
				            	</div>
				            </div>
				        </div>
				        <div class="p-4 space-y-2" x-show="active === 3"
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
			</div>
	    </div>
    </div>
@endsection