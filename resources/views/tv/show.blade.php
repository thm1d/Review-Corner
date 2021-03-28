@extends('layouts.main')

@section('content')
    <div class="tv-show-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $tvShow['poster_path'] }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $tvShow['name'] }} ({{ $tvShow['release_year'] }})</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="">{{ $tvShow['vote_average'] }}</span>
                    <!-- <span>{{ $tvShow['episode_run_time'] }}min</span> -->
                    <span class="mx-2">|</span>
                    <span>{{ ($tvShow['first_air_date']) }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvShow['genres'] }}</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $tvShow['overview'] }}
                </p>

                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach ($tvShow['created_by'] as $creator)
                            <div class="mr-8">
                                <div>{{ $creator['name'] }}</div>
                                <div class="text-sm text-gray-400">Creator</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-data="{ isOpen: false }">
                    @if (count($tvShow['videos']['results']) > 0)
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
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvShow['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

    <div class="tv-show-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($tvShow['cast'] as $cast)
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

    <div class="tv-show-images border-b border-gray-800" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($tvShow['backdrops'] as $image)
                    <div class="mt-8">
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
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
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
    </div> <!-- end tv-images -->

    <div class="similar-tvshow-container border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 block">
            <h2 class="text-4xl font-semibold">Similar TV Shows</h2>
            <div class="similar-tvshows grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($tvShow['similarTvShows'] as $similarTvShow)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{ route('tv.show', $similarTvShow['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $similarTvShow['poster_path'] }}" alt="tvshow cover" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            
                        </div>
                        <a href="{{ route('tv.show', $similarTvShow['id']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-8">{{ $similarTvShow['name'] }}</a>
                        <div class="text-gray-400 mt-1">
                            {{ \Carbon\Carbon::parse($similarTvShow['first_air_date'])->format('M d, Y') }}
                        </div>
                    </div>
                @endforeach

            </div> <!-- end similar-movies -->
        </div>
    </div> <!-- end similar-movies-container -->

    <div class="tv-review border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 block">
            <div class="flex flex-row ">
                <h2 class="text-4xl font-semibold mr-8">Social</h2>
                <h3 class="text-2xl font-normal py-3 ">Reviews</h3>
            </div>

            <div class="review-box box-border border border-white border-opacity-25 border-l-0 border-r-0 h-auto w-full px-8 mt-8"> 
                @foreach ($tvShow['reviews'] as $review)
                <?php 
                if ($review['author_details']['avatar_path'] === null) {
                    $user_avatar = 'https://ui-avatars.com/api/?name='. $review['author_details']['username'];
                }
                else {
                    $user_avatar = strpos($review['author_details']['avatar_path'], 'gravatar')
                    ? ltrim($review['author_details']['avatar_path'],'/')
                    :   'https://www.themoviedb.org/t/p/w64_and_h64_face'.$review['author_details']['avatar_path'];
                } 
                if ($review['author_details']['rating'] === null) {
                    $review['author_details']['rating'] = rand(5,9);
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
                                    {{ $review['author_details']['rating'] }}
                                </div>
                            </div>
                            <h5 class="text-xs">Written by <a href="/u/Dark+Jedi">{{ $review['author'] }}</a> on {{ \Carbon\Carbon::parse($review['created_at'])->format('M d, Y') }}</h5>
                        </div>   
                    </div>
                    <div class="teaser overflow-ellipsis overflow-hidden w-full h-40 pl-20 pt-5 " style="">
                        <p>{{ $review['content'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end tv-review -->
@endsection