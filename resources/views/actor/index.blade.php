@extends('layouts.main')

@section('content')
	<div class="container mx-auto px-4 py-16">
		<div class="popular-actors">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular actors</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($popularActors as $actor)
					<div class="mt-8">
						<a href="{{ route('actors.show', $actor['id']) }}">
							<img src="{{ $actor['profile_path'] }}" alt="actor" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('actors.show', $actor['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $actor['name'] }}</a>
						</div>
						<div class="text-sm truncate text-gray-400">{{ $actor['known__for'] }}</div>
					</div>
				@endforeach
			</div>
		</div> <!-- end popular actors -->
		<div class="flex justify-between mt-16">
			@if ($previous)
				<button class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-2 hover:bg-orange-600 transition ease-in-out duration-150">
                    <a href="{{ route('actors.index', $previous) }}">Previous</a>
                </button>
			@endif

			@if ($next)
				<button class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-2 hover:bg-orange-600 transition ease-in-out duration-150">
                    <a href="{{ route('actors.index', $next) }}">Next</a>
                </button>
			@endif
		</div>
		
	</div>
@endsection
