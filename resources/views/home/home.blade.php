@extends('layouts.main')

@section('content')
	<div class="container mx-auto px-4 pt-16">
		<div class="editor-picks">
        	<div class="container mx-auto">
            	<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mb-8">Editor's Picks</h2>
				<!-- Flickity HTML init -->
				<div class="carousel mb-8" data-flickity='{ "groupCells": true, "wrapAround": true, "autoPlay": true, "imagesLoaded": true }'>
					@foreach ($lists as $list)
					<div class="carousel-cell">
						@if ($list['type'] == 'movie')
						<a href="{{ route('movies.show', ['movie'=>$list['id']]) }}">
							<img src="{{ $list['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						@else
						<a href="{{ route('tv.show', $list['id']) }}">
							<img src="{{ $list['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						@endif
						<div class="mt-2">
							@if ($list['type'] == 'movie')
							<a href="{{ route('movies.show', $list['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $list['title'] }}</a>
							@else
							<a href="{{ route('tv.show', $list['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $list['title'] }}</a>
							@endif
								<div class="flex items-center text-gray-400 text-sm mt-1">
									<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
									<span class="ml-1">{{ $list['vote_average'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ $list['release_date'] }}</span>
								</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div> <!-- end-editor-picks-section -->

		<div class="my-16">
			<div class="flex flex-col md:flex-col sm:flex-col lg:flex-row xl:flex-row mt-8">
				<div class="trailer lg:w-2/5 xl:w-2/5 md:w-full sm:w-full">
			        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mb-4 px-4 pt-4">Latest Trailers</h2>
			        @foreach ($trailers as $trailer)
			        <div class="px-4" x-data="{ isOpen: false }">
			        	<ul>
                            <li class="border-b border-gray-700">
                                <a @click="isOpen = true" href="#" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                                    <img src="{{ $trailer['poster_path'] }}" alt="poster" class="w-16">
                                    <div class="grid grid-row">
	                                    <h3 class="ml-4 font-semibold">{{ $trailer['title'] }}</h3>
	                                    <h6 class="ml-4 font-light">{{ $trailer['name'] }}</h6>
	                                </div>
                                </a>
                            </li>
			            </ul> 
			            <template x-if="isOpen">
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-screen h-screen flex items-center shadow-lg overflow-y-auto z-50"
                                x-show.transition.opacity="isOpen"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto z-50">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isOpen = false"
                                                @keydown.escape.window="isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $trailer['path'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
			        </div>
                    @endforeach	
				</div>
				<div class="trending ml-4 lg:w-3/5 xl:w-3/5 md:w-full sm:w-full md:mt-8 sm:mt-8 lg:mt-0 xl:mt-0">
					<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mb-4 px-4 pt-4">Trending This Week</h2>
					<div class="flex flex-row flex-wrap">
						@foreach ($trendings as $trending)
						<div class="my-2 mx-2">
							@if ($trending['media_type'] == 'movie')
							<a href="{{ route('movies.show', ['movie'=>$trending['id']]) }}">
								<img src="{{ $trending['poster_path'] }}" alt="Poster" class="my-1 mx-1 w-44 hover:opacity-75 transition ease-in-out duration-150">
							</a>
							@else
							<a href="{{ route('tv.show', $trending['id']) }}">
								<img src="{{ $trending['poster_path'] }}" alt="Poster" class="my-1 mx-1 w-44 hover:opacity-75 transition ease-in-out duration-150">
							</a>
							@endif
							<div class="mt-2">
								@if ($trending['media_type'] == 'movie')
								<a href="{{ route('movies.show', $trending['id']) }}" class="text-lg mt-1 ml-1 hover:text-gray-300">{{ $trending['title'] }}</a>
								@else
								<a href="{{ route('tv.show', $trending['id']) }}" class="text-lg mt-1 ml-1 hover:text-gray-300">{{ $trending['title'] }}</a>
								@endif
							</div>
						</div>
	                    @endforeach
	                </div>
				</div>
			</div>
		</div>

		<div class="movies-in-theater p-1 z-10">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Movies In Theater</h2>
			<div class="carousel2 mb-8" data-flickity='{ "groupCells": true, "wrapAround": true, "autoPlay": false, "imagesLoaded": true }'>
				@foreach ($moviesInTheater as $movie)
					<div class="carousel-cell2 mt-8">
						<a href="{{ route('movies.show', ['movie'=>$movie['id'], 'title'=>$movie['title']]) }}">
							<img src="{{ $movie['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 text-white hover:text-gray:500">{{ $movie['title'] }}</a><br>
							<span class="text-sm text-gray-400">{{ $movie['release_date'] }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- end-movies-in-theater -->

		<div class="shows-on-tv py-16">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Shows On TV</h2>
			<div class="carousel2 mb-8" data-flickity='{ "groupCells": true, "wrapAround": true, "autoPlay": false, "imagesLoaded": true }'>
				@foreach ($showsOnTv as $tvShow)
					<div class="carousel-cell2 mt-8">
						<a href="{{ route('tv.show', $tvShow['id']) }}">
							<img src="{{ $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 text-white hover:text-gray:500">{{ $tvShow['name'] }}</a><br>
							<span class="text-sm text-gray-400">{{ $tvShow['first_air_date'] }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- tvshows-on-tv -->

		<div class="recently-released-games">
	        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Recently Released Games</h2>
			<div class="carousel2 mb-8" data-flickity='{ "groupCells": true, "wrapAround": true, "autoPlay": false, "imagesLoaded": true }'>
			    @foreach ($games as $game)
			        <div class="carousel-cell2 game mt-8">
					    <div class="relative inline-block">
					        <a href="{{ route('games.show', $game['slug']) }}">
					            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
					        </a>
					        
					    </div>
					    <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-2">{{ $game['name'] }}</a>
					    <div class="text-gray-400 mt-1">
					        {{ $game['platforms'] }}
					    </div>
					</div>
			    @endforeach
			</div>
		</div>

		<div class="popular-review border-b border-gray-800">
	        <div class="container mx-auto py-16 block">
	        	<h3 class="uppercase tracking-wider text-orange-500 text-lg font-semibold pt-4">Popular Reviews This Week</h3>
	            <div class="review-box h-auto w-full py-2 mt-2">
		            <div class="mb-8 w-full">
		                @foreach ($popular_reviews as $review)
		                <hr>
		                <div class="review-header flex flex-row w-full py-2 px-2">
		                    <div class="avatar mr-5 mt-2 md:mt-0 w-20">
		                        @if ($review['media_type'] == 'movie')
								<a href="{{ route('movies.show', $review['id']) }}">
								    <img src="{{ $review['poster'] }}" alt="avatar" class="rounded hover:opacity-75 transition ease-in-out duration-150">
								</a>
								@else
								<a href="{{ route('tv.show', $review['id']) }}" class="hover:opacity-75 transition ease-in-out duration-150">
								    <img src="{{ $review['poster'] }}" alt="avatar" class="rounded hover:opacity-75 transition ease-in-out duration-150">
								</a>
								@endif
		                    </div>
		                    <div class="info w-full flex flex-col mt-2 md:mt-0">
		                        <div class="rating_wrapper w-full justify-start">
		                            <h2 class="font-bold text-2xl">
		                                @if ($review['media_type'] == 'movie')
										<a href="{{ route('movies.show', $review['id']) }}" class="hover:text-gray-300">{{ $review['title'] }}</a>
										@else
										<a href="{{ route('tv.show', $review['id']) }}" class="hover:text-gray-300">{{ $review['title'] }}</a>
										@endif
		                                <small class="font-light text-xl">{{ $review['year'] }}</small>
		                            </h2>
		                            <div class="flex items-center mt-2">
			                            <img src="{{ $review['user_avatar'] }}" alt="avatar" class="rounded-full w-6 mr-2"><h5 class="text-xs">{{ $review['user_name'] }}</h5>
				                        <div class="rounded rating px-8 ml=14 flex text-sm items-center justify-items-center bg-transparent ">
				                            <svg class="fill-current text-orange-500 w-4 mr-1" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg> 
				                            {{ $review['rating'] }}
				                        </div>
		                            </div>
			                        
		                        </div>
		                        <div class="content w-min h-auto" id="review-height">
				                    <p class="break-words py-2 font-thin text-base" id="review-content">{{ $review['review_short'] }}<button class="px-2 text-blue-500" id="full-review-button" onclick='showReview(this, "<?php echo $review['review_full'];  ?>");'>read full review</button></p>
				                </div>
				            </div>
		                </div>
				        @endforeach
		            </div>
	            </div>
	        </div>
	    </div>
	</div>

@endsection
