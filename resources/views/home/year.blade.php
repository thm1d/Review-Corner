@extends('layouts.main')

@section('content')

	<div class="container mx-auto px-4 py-16">
		<div class="year-wise-movies">
			<h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Movies</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($yearWiseMovies as $movie)
					<div class="mt-8">
						<a href="{{ route('movies.show', ['movie'=>$movie['id']]) }}">
							@if ($movie['poster_path'] != null)
								<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150" style="">
							@else
								<img src="{{ 'https://via.placeholder.com/500x750/808080/000000?text='. $movie['title'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
							@endif
						</a>
						<div class="mt-2">
							<a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}
							</a>
							<div class="flex items-center text-gray-400 text-sm mt-1">
								<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
								<span class="ml-1">{{ $movie['vote_average'] }}</span>
								<span class="mx-2">|</span>
								<span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- end year-wise-movies -->

		<div class="year-wise-tvshows my-16">
			<h2 class="uppercase tracking-wider text-orange-500 text-2xl font-semibold">Tv Shows</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($yearWiseTvShows as $tvShow)
					<div class="mt-8">
						<a href="{{ route('tv.show', ['tv'=>$tvShow['id']]) }}">
							@if ($tvShow['poster_path'] != null)
								<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150" style="">
							@else
								<img src="{{ 'https://via.placeholder.com/500x750/808080/000000?text='. $tvShow['name'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
							@endif
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvShow['name'] }}
							</a>
							<div class="flex items-center text-gray-400 text-sm mt-1">
								<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
								<span class="ml-1">{{ $tvShow['vote_average'] }}</span>
								<span class="mx-2">|</span>
								<span>{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- end year-wise-tvshows -->
	</div>


@endsection