@extends('layouts.app')

@section('content')

<div class="container mx-auto mb-4">
	<div class="your-ratings-container mx-0 md:mx-0 sm:mx-0 lg:mx-40 xl:mx-40 border-2 border-t-0 border-gray-600 h-auto min-h-screen text-white">
		<div class="mx-4 my-4 border border-opacity-25 border-gray-600 rounded-lg min-h-screen">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-4 mt-4 px-2 py-4">Your Ratings</h2>
			<div class="h-auto mx-6 my-4 px-2 py-2 text-sm border border-gray-700 border-opacity-10 bg-gray-800">{{ count($movies)+count($tvShows) }} Titles</div>
			<div class="rating-index mx-6 my-4 ">
				@foreach ($movies as $movie)
					<div class="mb-4 pb-2 border-b">
						<div class="flex items-center">
							<img src="{{ 'https://image.tmdb.org/t/p/w342/'. $movie['poster_path'] }}" alt="poster" class="w-36">
							<div class="desc mx-8">
								<span class="text-lg">{{ $movie['title'] }}</span>
								<div class="flex items-center text-gray-400 text-xs mt-1">
									
									<span>{{ $movie['rated'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ date('g\h i',mktime(0,$movie['runtime'])) }}min </span>
									<span class="mx-2">|</span>
									<span>{{ $movie['Genre'] }}</span>
								</div>
								<div class="mt-4 flex flex-row">
									<svg class="fill-current text-blue-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
			                        <span class="ml-1 mr-2">{{ $movie['rating'] }}</span>
			                    </div>
			                    <span class="mt-2 text-sm font-light">Rated on {{ \Carbon\Carbon::parse($movie['rated_on'])->format('M d, Y') }}</span>
								<div class="overview mt-4 text-sm pr-4">
									<p>{{ $movie['overview'] }}</p>
								</div>
								<div class="my-2">
									<span class="text-xs">Stars: {{ $movie['stars'] }}</span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="rating-index mx-6 my-4 ">
				@foreach ($tvShows as $tvShow)
					<div class="mb-4 border-b">
						<div class="flex items-center">
							<img src="{{ 'https://image.tmdb.org/t/p/w342/'. $tvShow['poster_path'] }}" alt="poster" class="w-36">
							<div class="desc mx-8">
								<span class="text-lg">{{ $tvShow['name'] }}</span>
								<div class="flex items-center text-gray-400 text-xs mt-1">
									
									<span>{{ $tvShow['rated'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ $tvShow['runtime'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ $tvShow['Genre'] }}</span>
								</div>
								<div class="mt-4 flex flex-row">
									<svg class="fill-current text-blue-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
			                        <span class="ml-1 mr-2">{{ $tvShow['rating'] }}</span>
			                    </div>
			                    <span class="mt-2 text-sm font-light">Rated on {{ \Carbon\Carbon::parse($tvShow['rated_on'])->format('M d, Y') }}</span>
								<div class="overview mt-4 text-sm pr-4">
									<p>{{ $tvShow['overview'] }}</p>
								</div>
								<div class="my-2">
									<span class="text-xs">Stars: {{ $tvShow['stars'] }}</span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection