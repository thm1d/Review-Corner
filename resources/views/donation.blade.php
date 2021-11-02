@extends('layouts.main')

@section('content')
<div class="flex items-center justify-center h-auto my-16 bg-gray-900">
	<div class="container">
		<div class="tab mx-0 sm:mx-0 md:mx-10 lg:mx-40 xl:mx-40 px-8 py-8 my-8 h-auto border border-gray-800 bg-gray-800">
			<div x-data="{tab: window.location.hash ? window.location.hash.substring(1) : 0 }" class="h-auto pb-10 mb-2">
				<div class="flex border-0 overflow-hidden">

					<button class="px-4 py-2 w-full hover:text-gray-400 border-0" x-bind:class="{'border-b-2 border-blue-600': tab == 0}" @click.prevent="tab = 0;window.location.hash = 0" ><a href="#0">Facilities</a></button>
					<button class="px-4 py-2 w-full hover:text-gray-400 border-0" x-bind:class="{'border-b-2 border-blue-600': tab == 1}" @click.prevent="tab = 1;window.location.hash = 1" ><a href="#1">Method</a></button>
					<button class="px-4 py-2 w-full hover:text-gray-400 border-0" x-bind:class="{'border-b-2 border-blue-600': tab == 2}" @click.prevent="tab = 2;window.location.hash = 2" ><a href="#2">Form</a></button>
					<button class="px-4 py-2 w-full hover:text-gray-400 border-0" x-bind:class="{'border-b-2 border-blue-600': tab == 3}" @click.prevent="tab = 3;window.location.hash = 3" ><a href="#3">FAQ</a></button>

			 
				</div>
				<div class="bg-gray-900 bg-opacity-10 h-auto mb-8">

					<div class="p-4 space-y-2" x-show="tab == 0" 
						x-transition:enter="transition ease-out duration-300"
						x-transition:enter-start="opacity-0 transform scale-90"
						x-transition:enter-end="opacity-100 transform scale-100">  <!-- TAB 0 -->
						<div class="flex flex-wrap justify-between my-8 px-1 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4">
							<div class="silver w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
								<h1 class="text-left font-semibold text-xl my-2 pb-4">&#2547;  200.00</h1>
								<ul style="list-style-type:square;" class="ml-4">
									<li>Feature 1</li>
									<li>Feature 2</li>
								</ul>
							</div>
							<div class="gold w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
								<h1 class="text-left font-semibold text-xl my-2 pb-4">&#2547;  300.00</h1>
								<ul style="list-style-type:square;" class="ml-4">
									<li>Feature 1</li>
									<li>Feature 2</li>
									<li>Feature 3</li>
								</ul>
							</div>
							<div class="platinum w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
								<h1 class="text-left font-semibold text-xl my-2 pb-4">&#2547;  500.00</h1>
								<ul style="list-style-type:square;" class="ml-4">
									<li>Feature 1</li>
									<li>Feature 2</li>
									<li>Feature 3</li>
									<li>Feature 4</li>
								</ul>
							</div>
							<div class="diamond w-full sm:w-full md:w-2/5 xl:w-2/5 lg:w-2/5 pl-4 py-4 text-start mx-4 my-4 bg-gray-800">
								<h1 class="text-left font-semibold text-xl my-2 pb-4">&#2547;  1000.00</h1>
								<ul style="list-style-type:square;" class="ml-4">
									<li>Feature 1</li>
									<li>Feature 2</li>
									<li>Feature 3</li>
									<li>Feature 4</li>
									<li>Feature 5</li>
								</ul>
							</div>
						</div>
						
					</div>

					<div class="p-2 space-y-2" x-show="tab == 1"
						x-transition:enter="transition ease-out duration-300"
						x-transition:enter-start="opacity-0 transform scale-90"
						x-transition:enter-end="opacity-100 transform scale-100"> <!-- TAB 1 -->
						<div class="my-8 px-1 sm:px-0 md:px-0 lg:px-2 xl:px-2 py-2 flex flex-col justify-center">
							<div class="flex flex-wrap justify-center items-center w-full h-auto">
								<div class="flex flex-col justify-center items-center w-5/12 h-64 mx-2 my-2" style="background-color: #b0bec5;">
									<img src="{{ asset('\img\Bkash-logo.png') }}" class="w-6/12 h-2/6">
									<h3 class="mt-4 text-black">bKash Account (Personal):</h3>
									<h3 class="py-1 text-black">01781939372</h3>
								</div>
								<div class="flex flex-col justify-center items-center w-5/12 h-64 mx-2 my-2" style="background-color: #b0bec5;">
									<img src="{{ asset('\img\Nagad-Logo.png') }}" class="w-6/12 h-2/6">
									<h3 class="mt-4 text-black">Nagad Account:</h3>
									<h3 class="py-1 text-black">01781939372</h3>
								</div>
								<div class="flex flex-col justify-center items-center w-5/12 h-64 mx-2 my-2" style="background-color: #b0bec5;">
									<img src="{{ asset('\img\dutch-bangla-rocket.png') }}" class="w-6/12 h-1/4">
									<h3 class="mt-4 text-black">DBBL Mobile Banking Account:</h3>
									<h3 class="py-1 text-black">019399795539</h3>
								</div>
								<div class="flex flex-col justify-center items-center w-5/12 h-64 mx-2 my-2" style="background-color: #b0bec5;">
									<div class="flex flex-row justify-center w-full">
										<img src="{{ asset('\img\Standard-Chartered-logo.png') }}" class="w-4/12 h-2/6 px-4 py-1">
										<img src="{{ asset('\img\city-bank-logo.png') }}" class="w-3/12 h-2/6 px-4">
									</div>
									<h3 class="mt-8 text-black">Please contact <a href="#" class="text-blue-800">Support</a> for Bank Account details</h3>
								</div>
							</div>
							
						</div>
					</div>

					<div class="p-4 space-y-2" x-show="tab == 2"
						x-transition:enter="transition ease-out duration-300"
						x-transition:enter-start="opacity-0 transform scale-90"
						x-transition:enter-end="opacity-100 transform scale-100"> <!-- TAB 2 -->
						<div class="my-8 px-0 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4 flex flex-col justify-center">
							<div class="h-auto py-4">
								@unless(Auth::check())
									<h3 class="px-2 flex justify-center">Please <a href="{{ route('login') }}" class="text-blue-300 hover:text-blue-600">&nbsp Login &nbsp</a> to access this feature.</h3>
								@endunless
								@auth
								<h3 class="text-2xl text-center text-teal-300">Hi ! Please submit this form after donation:</h3>
							    <form id="payment-form" method="POST" action="{{ route('donate.store') }}" class="max-w-lg mx-auto my-8 p-4 shadow text-lg text-white" x-data="{ selected: 'opt1' }">
									@csrf

								    <!-- Email and password inputs -->
								    <input class=" my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="full_name" placeholder="Full Name" aria-label="Full name">
								    <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="number" name="amount" placeholder="Amount in BDT" aria-label="Amount">

								    <div class="flex flex-col">
								        <label class="w-full mt-2 py-2 text-xl text-teal-600">Donation Method</label>

								        <div class="w-full sm:w-2/3 flex flex-col sm:ml-2 mb-4 p-4 rounded">
								            <label for="bkash" class="my-1 mt-0">
								                <input x-on:click="selected = 'opt1'" id="bkash" type="radio" name="method" value="bkash" checked>
								                bKash
								            </label>

								            <label for="rocket" class="my-1">
								                <input x-on:click="selected = 'opt2'" id="rocket" type="radio" name="method" value="rocket">
								                Rocket
								            </label>

								            <label for="nagad" class="my-1 mb-0">
								                <input x-on:click="selected = 'opt3'" id="nagad" type="radio" name="method" value="nagad">
								                Nagad
								            </label>

								            <label for="bank" class="my-1 mb-0">
								                <input x-on:click="selected = 'opt4'" id="bank" type="radio" name="method" value="bank">
								                Bank Deposit
								            </label>
								        </div>
								    </div>

								    <div x-show="selected == 'opt1'" class="flex flex-col mb-4" x-clock>
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="btranx_id" placeholder="TrxID (Transaction ID)">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="bsender_no" placeholder="Agent Number / bKash Number">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="bcontact_no" placeholder="Contact Number (Optional)">
								    </div>
					
								    <div x-show="selected == 'opt2'">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="rtranx_id" placeholder="TrxID (Transaction ID)">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="rsender_no" placeholder="Agent Number / ROCKET Account Number">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="rcontact_no" placeholder="Contact Number (Optional) eg:01711111111">
								    </div>

								    <div x-show="selected == 'opt3'">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="ntranx_id" placeholder="TrxID (Transaction ID)">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="nsender_no" placeholder="Nagad Number">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="ncontact_no" placeholder="Contact Number (Optional) eg:01711111111">
								    </div>

								    <div x-show="selected == 'opt4'">
								        <div class="flex flex-col ml-8">
									        <label class="w-full my-2 text-lg text-teal-600">Bank</label>
									        <div class="w-full sm:w-2/3 flex flex-col sm:ml-2 mb-4 p-4 rounded">
									        	<label for="bank_name" class="my-1 mt-0"><input id="bank_name" type="radio" name="bank" value="scb">SCB</label>    
									               
									            <label for="bank_name" class="my-1"><input id="bank_name" type="radio" name="bank" value="citybank">City Bank</label>
									        </div>
									    </div>
									    <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="depositor_name" placeholder="Depositor Name">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="number" name="acc_no" placeholder="Account Number (Applicable for online transfer)">
								        <input class="my-2 py-2 appearance-none bg-transparent border-b-2 w-full mr-3 py-1 px-2 leading-tight focus:outline-none" type="tel" pattern="[0-9]{11}" name="bkcontact_no" placeholder="Contact Number (Optional)">
								    </div>

								    <div class="mt-2 text-left">
								        <button id="card-button" name="submitPayment" type="submit" class="py-2 px-4 bg-teal-500 hover:bg-green-600 text-green-100 rounded-lg" value="clicked">
								            Submit
								        </button>
								    </div>
								</form>
								@if (Session::has('msg'))
					            <div class="text-teal-800 my-4 bg-teal-200 p-2 text-center rounded-md">
					                <h3 class="font-bold text-lg">{{ Session::get('msg') }}</h3>
					            </div>
					            @endif
								@endauth
								
							</div>
						</div>
					</div>

					<div class="p-4 space-y-2" x-show="tab == 3"
						x-transition:enter="transition ease-out duration-300"
						x-transition:enter-start="opacity-0 transform scale-90"
						x-transition:enter-end="opacity-100 transform scale-100"> <!-- TAB 3 -->
						<div class="my-8 px-1 sm:px-0 md:px-2 lg:px-4 xl:px-4 py-4 flex flex-col justify-center">
							<div class="">
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">Why donate?</h3>
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">I want to donate? What to do?</h3>
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">How long does it take to update my account?</h3>
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">What are the TrxID, Agent / Account Number for bKash?</h3>
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">What are the TxnId, Agent / Account Number for ROCKET?</h3>
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">Do you have any user manual?</h3>
								<h3 class="border border-gray-800 bg-gray-900 px-4 py-2 shadow-lg hover:text-gray-400">Where is the prize list?</h3>
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
						setTimeout(() => show = false, 7500);
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