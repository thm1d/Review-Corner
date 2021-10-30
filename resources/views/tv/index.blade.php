@extends('layouts.main')

@section('content')

	<div class="container mx-auto px-4 pt-16">
		<div class="on-the-air-shows">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">On The Air Shows</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($onTheAirShows as $tvShow)
					<div class="mt-8">
						<a href="{{ route('tv.show', $tvShow['id']) }}">
							<img src="{{ $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvShow['name'] }}</a>
								<div class="flex items-center text-gray-400 text-sm mt-1">
									<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
									<span class="ml-1">{{ $tvShow['vote_average'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ $tvShow['first_air_date'] }}</span>
								</div>
								<div class="text-gray-400 text-sm">
									{{ $tvShow['genres'] }}
								</div>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- end pouplar-shows -->

		<div class="popular-shows py-24">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($popularShows as $tvShow)
					<div class="mt-8">
						<a href="{{ route('tv.show', $tvShow['id']) }}">
							<img src="{{ $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvShow['name'] }}</a>
								<div class="flex items-center text-gray-400 text-sm mt-1">
									<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
									<span class="ml-1">{{ $tvShow['vote_average'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ $tvShow['first_air_date'] }}</span>
								</div>
								<div class="text-gray-400 text-sm">
									{{ $tvShow['genres'] }}
								</div>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- top rated shows -->

		<div class="toprated-shows pb-24">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($topRatedShows as $tvShow)
					<div class="mt-8">
						<a href="{{ route('tv.show', $tvShow['id']) }}">
							<img src="{{ $tvShow['poster_path'] }}" alt="Poster" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('tv.show', $tvShow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvShow['name'] }}</a>
								<div class="flex items-center text-gray-400 text-sm mt-1">
									<svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
									<span class="ml-1">{{ $tvShow['vote_average'] }}</span>
									<span class="mx-2">|</span>
									<span>{{ $tvShow['first_air_date'] }}</span>
								</div>
								<div class="text-gray-400 text-sm">
									{{ $tvShow['genres'] }}
								</div>
						</div>
					</div>
				@endforeach
			</div>
		</div> <!-- top rated shows -->
		<div class="by-genres-and-by-year py-16">
			<div class="grid grid-cols-2 gap-12 w-full">
				<div class="by-genres border border-transparent rounded h-max" style="background-color: rgb(62, 76, 94); ">
					<div class="bg-gray-900 m-1">
						<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold p-2">Genres</h2>
						@foreach ($genres as $key => $value)
						<ul>
							<li class="border-t border-gray-300 p-2 mx-4 hover:text-gray-400"><a href="{{ route('home.genre', [ 'key' => $key, 'value' => $value]).'?'.http_build_query(['page' => $gcounter, 'type' => 'tv']) }}">{{ $value }}</a></li>
						</ul>
						@endforeach
					</div>
				</div>

				<div class="by-year border border-transparent rounded h-max" style="background-color: rgb(62, 76, 94); ">
					<div class="bg-gray-900 m-1">
						<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold p-2">Years</h2>
						@foreach (@range(0,15) as $diff)
						<ul>
							<li class="border-t border-gray-300 p-2 mx-4 hover:text-gray-400"><a href="{{ route('home.year', [ 'year' => ( date('Y') - $diff )]).'?'.http_build_query(['page' => $ycounter, 'type' => 'tv']) }}">{{ date('Y') - $diff }}</a></li>
						</ul>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
