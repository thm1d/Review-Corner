@extends('layouts.main')

@section('content')
    <div class="container mx-auto mb-4">
    	<div class="genre-container mx-0 md:mx-0 sm:mx-0 lg:mx-40 xl:mx-40 border-2 border-t-0 border-gray-600 h-auto min-h-screen text-white mb-4 mb-8 py-4">
		<div class="mx-4 my-4 border border-opacity-25 border-gray-600 rounded-lg min-h-screen">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ml-4 mt-4 px-2 py-4">Top {{ $value }} {{ $type }}s</h2>
			<div class="h-auto mx-6 my-4 px-2 py-2 text-sm border border-gray-700 border-opacity-10 bg-gray-800">{{ $total_results }} Titles</div>
			<div class="genra-index mx-6 my-4 ">
				@if ( $type == 'movie' )
				@foreach ($genreWiseList as $movie)
					<div class="mb-4 pb-2 border-b">
						<div class="flex flex-row">
							<a href="{{ route('movies.show', ['movie'=>$movie['id']]) }}" class="w-1/5">
								<img src="{{ 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'] }}" alt="poster" class=" hover:opacity-75 transition ease-in-out duration-150">
							</a>
							<div class="desc mx-8 w-4/5">
								<a href="{{ route('movies.show', $movie['id']) }}" class="text-lg hover:text-gray-300">{{ $movie['title'] }}</a>
								<div class="flex items-center text-gray-400 text-xs mt-1">
									<span></span>
								</div>
								<div class="mt-4 flex flex-row">
									<svg class="fill-current text-blue-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
			                        <span class="ml-1 mr-2">{{ $movie['vote_average'] }}</span>
			                    </div>
			                    
								<div class="overview mt-4 text-sm pr-4">
									<p>{{ $movie['overview'] }}</p>
								</div>
								<div class="my-2">
									<span class="text-xs mr-1">Release: <span class="text-blue-500">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span></span>
									<span class="text-xs ml-1">Language: <span class="text-blue-500">{{ $movie['original_language'] }}</span></span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				@else
				@foreach ($genreWiseList as $tvShow)
					<div class="mb-4 pb-2 border-b">
						<div class="flex flex-row">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="w-1/5">
								<img src="{{ 'https://image.tmdb.org/t/p/w500'.$tvShow['poster_path'] }}" alt="poster" class=" hover:opacity-75 transition ease-in-out duration-150">
							</a>
							<div class="desc mx-8 w-4/5">
								<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg hover:text-gray-300">{{ $tvShow['name'] }}</a>
								<div class="flex items-center text-gray-400 text-xs mt-1">
									<span></span>
								</div>
								<div class="mt-4 flex flex-row">
									<svg class="fill-current text-blue-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
			                        <span class="ml-1 mr-2">{{ $tvShow['vote_average'] }}</span>
			                    </div>
			                    
								<div class="overview mt-4 text-sm pr-4">
									<p>{{ $tvShow['overview'] }}</p>
								</div>
								<div class="my-2">
									<span class="text-xs mr-1">Release: <span class="text-blue-500">{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span></span>
									<span class="text-xs ml-1">Language: <span class="text-blue-500">{{ $tvShow['original_language'] }}</span></span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				@endif
			</div>
			<div class="flex justify-between mt-16 mb-8 mx-4">
				@if ($counter != 1)
				<button class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-2 hover:bg-orange-600 transition ease-in-out duration-150">
					<a href="{{ route('home.genre', [ 'key' => $key, 'value' => $value]).'?'.http_build_query(['page' => $counter-1]) }}">
					<-Previous
					</a>
	            </button>
	            @endif
	            @if ($counter != 500)
				<button class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-2 hover:bg-orange-600 transition ease-in-out duration-150">
					<a href="{{ route('home.genre', [ 'key' => $key, 'value' => $value]).'?'.http_build_query(['page' => $counter+1]) }}">
					Next->
					</a>
	            </button>
	            @endif
			</div>
		</div>
	</div>

@endsection