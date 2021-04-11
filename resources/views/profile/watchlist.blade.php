@extends('layouts.app')

@section('content')

<div class="container mx-auto mb-4">
	<div class="your-ratings-container mx-0 md:mx-0 sm:mx-0 lg:mx-40 xl:mx-40 border-2 border-t-0 border-gray-600 h-auto min-h-screen text-white">
		<div class="mx-4 my-4 border border-opacity-25 border-gray-600 rounded-lg min-h-screen">
			<div class="watchlist-movies border-b" style="min-height: 50vh;">
				<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-4 mt-4 px-2 py-4">Movies</h2>
				@if ($movies != null)
					<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
						@foreach ($movies as $movie)
							<div class="mt-8">
								<a href="{{ route('movies.show', ['movie'=>$movie['id']]) }}">
									@if ($movie['poster_path'] != null)
										<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
									@else
										<img src="{{ 'https://via.placeholder.com/500x750/808080/000000?text='. $movie['title'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
									@endif
								</a>
								<div class="mt-2">
									<a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 text-white hover:text-gray-500">{{ $movie['title'] }}</a>
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
				@else
					<div class="flex justify-center items-center text-center px-8 py-4">
						<h3 class="text-lg font-semibold text-red-700 mt-8">"No Item Found"</h3>
					</div>
				@endif
			</div> <!-- end watchlist-movies -->

			<div class="watchlist-tvshows py-4" style="min-height: 380px;">
				<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-4 mt-4 px-2 py-4">Tv Shows</h2>
				@if ($tvShows != null)
					<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
						@foreach ($tvShows as $tvShow)
							<div class="mt-8">
								<a href="{{ route('tv.show', ['tv'=>$tvShow['id']]) }}">
									@if ($tvShow['poster_path'] != null)
										<img src="{{ 'https://image.tmdb.org/t/p/w500/'. $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
									@else
										<img src="{{ 'https://via.placeholder.com/500x750/808080/000000?text='. $movie['title'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
									@endif
								</a>
								<div class="mt-2">
									<a href="{{ route('tv.show', ['tv'=>$tvShow['id']]) }}" class="text-lg mt-2 text-white hover:text-gray-500">{{ $tvShow['name'] }}</a>
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
				@else
					<div class="flex justify-center items-center text-center px-8 py-4">
						<h3 class="text-lg font-semibold text-red-700 mt-8">"No Item Found"</h3>
					</div>
				@endif
			</div> <!-- end watchlist-tvshows -->
		</div>
	</div>
</div>

@endsection