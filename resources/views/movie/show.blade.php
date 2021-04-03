@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $movie['poster_path'] }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $movie['title'] }} ({{ $movie['release_year'] }})</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    @if ($movie != $imdb)
                        <span>{{ $imdb['Rated'] }}</span>
                        <span class="mx-2">|</span>
                    @endif
                    <span>{{ $movie['runtime'] }}min</span>
                    <span class="mx-2">|</span>
                    <span>{{ ($movie['release_date']) }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['genres'] }}</span>
                </div>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1 mr-2">{{ $movie['vote_average'] }}</span>
                        @foreach ($imdb['Ratings'] as $ratings)
                            <div class="flex items-center">
                                @if ($ratings['Source'] == "Internet Movie Database")
                                    <a href="https://www.imdb.com/title/{{ $imdb['imdbID'] }}" target="_blank">
                                        <img src="{{ URL::asset('/img/imdb-seeklogo.com.svg') }}" class="w-10">
                                    </a>
                                    <span class="ms-2 ml-2 mr-2">{{ $imdb['imdbRating'] }} ({{ $imdb['imdbVotes'] }})</span>
                                @endif
                                @if ($ratings['Source'] == "Rotten Tomatoes")
                                    <img src="{{ URL::asset('/img/Rotten-Tomatoes.png') }}" class="w-8">
                                    <span class="ms-2 ml-2 mr-2">{{ $ratings['Value'] }}</span>
                                @endif
                                @if ($ratings['Source'] == "Metacritic")
                                    <img src="{{ URL::asset('/img/132px-Metacritic.png') }}" class="w-8">
                                    <span class="ms-2 ml-2 mr-2">{{ $ratings['Value'] }}</span>
                                @endif
                            </div>
                        @endforeach
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-data="{ isOpen: false }">
                    @if (count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>

                        <template x-if="isOpen">
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                x-show.transition.opacity="isOpen"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
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
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endif
                </div>

            </div>
        </div>
    </div> <!-- end movie-info -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            @if ($cast['profile_path'] == null )
                                <div class="mb-12">
                                    <img src="{{ URL::asset('/img/Null_avatar.png') }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                                </div>
                            @endif
                            <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                            <div class="text-sm text-gray-400">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->

    <div class="movie-images border-b border-gray-800" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['backdrops'] as $image)
                    <div class="mt-8 ">
                        <a
                            @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end movie-images -->

    <div class="similar-movies-container border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 block">
            <h2 class="text-4xl font-semibold">Similar Movies</h2>
            <div class="similar-games grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['similarMovies'] as $similarMovie)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{ route('movies.show', $similarMovie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $similarMovie['poster_path'] }}" alt="movie cover" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            
                        </div>
                        <a href="{{ route('movies.show', $similarMovie['id']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-8">{{ $similarMovie['title'] }}</a>
                        <div class="text-gray-400 mt-1">
                            {{ \Carbon\Carbon::parse($similarMovie['release_date'])->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach

            </div> <!-- end similar-movies -->
        </div>
    </div> <!-- end similar-movies-container -->

    <div class="movie-review border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 block">
            <div class="flex flex-row ">
                <h2 class="text-4xl font-semibold mr-8">Social</h2>
                <h3 class="text-2xl font-normal py-3 ">Reviews ({{ $movie['reviews']->count() }})</h3>
            </div>

            <div class="review-box box-border border border-white border-opacity-25 border-l-0 border-r-0 h-auto w-full px-8 mt-8"> 
                @foreach ($movie['reviews'] as $review)
                <?php 
                if ($review['author_details']['avatar_path'] === null) {
                    $user_avatar = 'https://ui-avatars.com/api/?name='. $review['author_details']['username'];
                }
                else {
                    $user_avatar = strpos($review['author_details']['avatar_path'], 'gravatar')
                    ? ltrim($review['author_details']['avatar_path'],'/')
                    :   'https://www.themoviedb.org/t/p/w64_and_h64_face'.$review['author_details']['avatar_path'];
                } ?>

                <div class="mb-8 w-full">
                    <div class="review-header flex flex-row items-center content-center w-full my-2">
                        <div class="avatar mr-5 mt-2 md:mt-0 w-16">
                            <a href="#">
                                <img src="{{ $user_avatar }}" alt="avatar" class="rounded-full w-16 h-16">
                            </a>
                        </div>
                        <div class="info w-full">
                            <div class="rating_wrapper w-full flex flex-wrap items-baseline justify-start">
                                <h3 class="font-bold">
                                    A review by {{ $review['author_details']['username'] }}.
                                </h3>
                                <div class="rounded rating px-8 ml=14 inline-flex text-sm items-center justify-items-center bg-transparent ">
                                    <svg class="fill-current text-orange-500 w-4 mr-1" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg> 
                                    {{ ($review['author_details']['rating']===null) ? rand(5,9) : $review['author_details']['rating'] }}
                                </div>
                            </div>
                            <h5 class="text-xs">Written by <a href="/u/Dark+Jedi">{{ $review['author'] }}</a> on {{ \Carbon\Carbon::parse($review['created_at'])->format('M d, Y') }}</h5>
                        </div>   
                    </div>
                    <div class="content w-full h-40">
                        <p class="overflow-ellipsis overflow-hidden w-full h-full pt-5">{{ $review['content'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-review -->
@endsection