@extends('layouts.main')

@section('content')
	<div class="container mx-auto px-4 pt-16">
		<div class="trailer">
        	<div class="container mx-auto">
            	<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mb-8">Upcoming Movie Trailers</h2>
				<div class="main-carousel h-4/6 " data-flickity='{ "autoPlay": true, "wrapAround": true }'>
					@foreach ($videos as $video)
						@if (!@strripos($video['name'],"Restricted"))
							<iframe class="mx-4" src="https://www.youtube.com/embed/{{ $video['key'] }}"></iframe> 
						@endif        
				  	@endforeach
				</div>
			</div>
		</div> <!-- end-trailer-section -->

		<div class="movies-in-theater pt-24">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Movies In Theater</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8">
				@php ($index = 0)
				@foreach ($moviesInTheater as $movie)
					@php ($index++)
					@if ($index > 8)
						@break
					@endif
					<div class="mt-8">
						<a href="{{ route('movies.show', ['movie'=>$movie['id'], 'title'=>$movie['title']]) }}">
							<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $movie['title'] }}</a><br>
							<span class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- end-movies-in-theater -->

		<div class="shows-on-tv py-24">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Shows On TV</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8">
				@php ($index = 0)
				@foreach ($showsOnTv as $tvShow)
					@php ($index++)
					@if ($index > 8)
						@break
					@endif
					<div class="mt-8">
						<a href="{{ route('tv.show', $tvShow['id']) }}">
							<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvShow['name'] }}</a><br>
							<span class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- tvshows-on-tv -->

	</div>

@endsection