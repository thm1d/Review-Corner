@extends('layouts.main')

@section('content')
	<div class="container mx-auto px-4 pt-16">
		<div class="trailer">
        	<div class="container mx-auto">
            	<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mb-8">Featured Movie Trailers</h2>
				<div class="main-carousel h-4/6 " data-flickity='{ "autoPlay": true, "wrapAround": true }'>
					@foreach ($videos as $video)
						@if ($video['trailer'] != null)
							<iframe class="mx-4" src="{{ $video['trailer'] }}"></iframe> 
						@endif     
				  	@endforeach
				</div>
			</div>
		</div> <!-- end-trailer-section -->

		<div class="movies-in-theater pt-24">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Movies In Theater</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8">
				
				@foreach ($moviesInTheater as $movie)
					<div class="mt-8">
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

		<div class="shows-on-tv py-24">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Shows On TV</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8">
				
				@foreach ($showsOnTv as $tvShow)
					<div class="mt-8">
						<a href="{{ route('tv.show', $tvShow['id']) }}">
							<img src="{{ $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvShow['name'] }}</a><br>
							<span class="text-sm text-gray-400">{{ $tvShow['first_air_date'] }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- tvshows-on-tv -->

		<div class="recently-released-games">
	        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Recently Released Games</h2>
			<div class="new-games text-sm grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-8 gap-8 pb-16 ">
			    @foreach ($games as $game)
			        <x-game-card :game="$game" />
			    @endforeach
			</div>
		</div>

		<div class="by-genres-and-by-year py-24 ">
			<div class="grid grid-cols-2 gap-12 w-full">
				<div class="by-genres border border-transparent rounded h-max" style="background-color: rgb(62, 76, 94); ">
					<div class="bg-gray-900 m-1">
						<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold p-2">Genres</h2>
						@foreach ($genresArray as $key => $value)
						<ul>
							<li class="border-t border-gray-300 p-2 mx-4 hover:text-gray-300"><a href="{{ route('home.genre', $key) }}">{{ $value }}</a></li>
						</ul>
						@endforeach
					</div>
				</div>

				<div class="by-year border border-transparent rounded h-max" style="background-color: rgb(62, 76, 94); ">
					<div class="bg-gray-900 m-1">
						<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold p-2">Years</h2>
						@foreach (@range(0,18) as $diff)
						<ul>
							<li class="border-t border-gray-300 p-2 mx-4 hover:text-gray-300"><a href="{{ route('home.year', ( date('Y') - $diff )) }}">{{ date('Y') - $diff }}</a></li>
						</ul>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		

	</div>

@endsection
