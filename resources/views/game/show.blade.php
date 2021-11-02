@extends('layouts.main')

@section('content')
    <div class="game-info border-b border-gray-800">
        <div class="game-details container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $game['coverImageUrl'] }}" alt="poster" class="w-64 lg:w-96">
                <div class="flex justify-center items-center space-x-4 mt-2 xl:mt-4 lg:mt-4 sm:mt-0">
                    @if ($game['social']['website'])
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="{{ $game['social']['website']['url'] }}" class="hover:text-gray-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 16 17" fill="none"><path d="M8 .266C3.582.266 0 3.952 0 8.5s3.582 8.234 8 8.234 8-3.686 8-8.234S12.418.266 8 .266zm2.655 11.873l-.365.375a.8.8 0 00-.2.355c-.048.188-.087.378-.153.56l-.561 1.556c-.444.1-.903.156-1.376.156v-.91c.055-.418-.246-1.203-.73-1.701-.194-.2-.302-.47-.302-.752v-1.062c0-.387-.203-.742-.531-.93a52.733 52.733 0 00-1.575-.866 4.648 4.648 0 01-1.02-.722l-.027-.024a3.781 3.781 0 01-.582-.689c-.303-.457-.796-1.209-1.116-1.698a6.581 6.581 0 013.33-3.383l.774.399c.343.177.747-.08.747-.475v-.375c.257-.043.52-.07.787-.08l.912.939a.542.542 0 010 .751l-.15.156-.334.343c-.101.104-.101.272 0 .376l.15.155c.102.104.102.272 0 .376l-.257.265a.255.255 0 01-.183.078h-.29a.254.254 0 00-.18.076l-.32.32a.269.269 0 00-.05.31l.502 1.035c.086.176-.039.384-.23.384h-.182a.253.253 0 01-.17-.065l-.299-.268a.51.51 0 00-.501-.102l-1.006.345a.386.386 0 00-.19.144.405.405 0 00.14.587l.357.184c.304.156.639.238.978.238.34 0 .729.906 1.032 1.062h2.153c.274 0 .537.112.73.311l.442.455c.184.19.288.447.288.716a1.584 1.584 0 01-.442 1.095zm2.797-3.033a.775.775 0 01-.457-.331l-.58-.896a.812.812 0 010-.883l.632-.976a.78.78 0 01.298-.27l.419-.216c.436.894.688 1.9.688 2.966 0 .288-.024.57-.06.848l-.94-.242z" /></svg>
                            </a>
                        </div>
                    @endif

                    @if ($game['social']['instagram'])
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="{{ $game['social']['instagram']['url'] }}" class="hover:text-gray-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 16 18" fill="none"><g clip-path="url(#clip0)"><path d="M8.004 4.957c-2.272 0-4.104 1.804-4.104 4.04 0 2.235 1.832 4.039 4.104 4.039 2.271 0 4.103-1.804 4.103-4.04 0-2.235-1.832-4.039-4.103-4.039zm0 6.666c-1.468 0-2.668-1.178-2.668-2.627 0-1.448 1.196-2.626 2.668-2.626 1.471 0 2.667 1.178 2.667 2.626 0 1.449-1.2 2.627-2.667 2.627zm5.228-6.831a.948.948 0 01-.957.942.948.948 0 01-.957-.942.95.95 0 01.957-.942.95.95 0 01.957.942zm2.718.956c-.06-1.262-.354-2.38-1.293-3.301-.936-.921-2.071-1.21-3.353-1.273C9.982 1.1 6.02 1.1 4.7 1.174c-1.279.06-2.414.348-3.354 1.27-.939.92-1.228 2.038-1.292 3.3-.075 1.301-.075 5.2 0 6.5.06 1.263.353 2.381 1.292 3.302.94.921 2.072 1.21 3.354 1.273 1.321.074 5.282.074 6.604 0 1.282-.06 2.417-.348 3.353-1.273.936-.921 1.229-2.039 1.293-3.301.075-1.3.075-5.196 0-6.497zm-1.707 7.893a2.68 2.68 0 01-1.522 1.497c-1.053.412-3.553.317-4.717.317-1.165 0-3.668.091-4.718-.317a2.68 2.68 0 01-1.522-1.497c-.418-1.037-.321-3.498-.321-4.645 0-1.146-.093-3.61.321-4.644a2.68 2.68 0 011.522-1.497c1.053-.412 3.553-.317 4.718-.317 1.164 0 3.667-.091 4.717.317.7.274 1.24.805 1.522 1.497.418 1.037.321 3.498.321 4.644 0 1.147.097 3.611-.321 4.645z" /></g><defs><clipPath id="clip0"><path fill="#fff" d="M0 0h16v18H0z"/></clipPath></defs></svg>
                            </a>
                        </div>
                    @endif

                    @if ($game['social']['twitter'])
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="{{ $game['social']['twitter']['url'] }}" class="hover:text-gray-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 18 18" fill="none"><path d="M6.382 15h-.06a8.152 8.152 0 01-3.487-.818 1.035 1.035 0 01-.585-1.08 1.057 1.057 0 01.87-.885 4.972 4.972 0 001.905-.667 7.117 7.117 0 01-2.633-6.803 1.058 1.058 0 01.75-.862 1.012 1.012 0 011.073.308 5.317 5.317 0 003.66 2.062A3.375 3.375 0 018.932 3.93a3.352 3.352 0 014.778.142.525.525 0 00.585.075 1.043 1.043 0 011.455 1.2 4.993 4.993 0 01-.96 1.95A8.093 8.093 0 016.382 15zm0-1.5h.06a6.592 6.592 0 006.818-6.442.99.99 0 01.277-.638c.183-.232.34-.483.465-.75a1.92 1.92 0 01-1.432-.638 1.836 1.836 0 00-1.32-.532 1.875 1.875 0 00-1.343.518 1.897 1.897 0 00-.54 1.814l.195.856-.877.06a6.225 6.225 0 01-4.905-1.8 5.34 5.34 0 002.797 4.845l.713.405-.473.675a4.216 4.216 0 01-2.01 1.44 6.25 6.25 0 001.568.187h.007z" /></svg>
                            </a>
                        </div>
                    @endif

                    @if ($game['social']['facebook'])
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="{{ $game['social']['facebook']['url'] }}" class="hover:text-gray-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 14 16" fill="none"><path d="M14 2.5v11a1.5 1.5 0 01-1.5 1.5H9.834V9.463h1.894L12 7.35H9.834V6c0-.612.17-1.028 1.047-1.028H12V3.084A15.044 15.044 0 0010.369 3C8.756 3 7.65 3.984 7.65 5.794v1.56h-1.9v2.112h1.903V15H1.5A1.5 1.5 0 010 13.5v-11A1.5 1.5 0 011.5 1h11A1.5 1.5 0 0114 2.5z" /></svg>
                            </a>
                        </div>
                    @endif


                </div>
            </div>
            <div class="md:ml-24">
                <div class="grid grid-cols-2">
                    <div class="title-and-ratings md:mr-4">
                        <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $game['name'] }}</h2>
                        <div class="flex items-center text-gray-400 text-sm mt-2">
                            <img src="{{ asset('\img\apple-icon-72x72.png') }}" class="w-12">
                            <span class="ml-1 mr-2">{{ $game['memberRating'] }}</span>
                            <img src="{{ asset('\img\apple-icon-72x72.png') }}" class="w-12">
                            <span class="ms-2 ml-2 mr-2">{{ $game['criticRating'] }}</span>
                            @auth
                                <svg class="fill-current text-blue-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                <span class="ms-2 ml-2 mr-2">{{ $rating }}</span>
                            @endauth
                        </div>

                    </div>

                    @auth
                        <div class="watchlist-and-add-rating flex justify-end justify-items-end grid grid-rows-2">

                            <div class="rating">
                                <div class="grid grid=rows-2">
                                    <div class="rating-select flex justify-self-center pt-1">
                                        <div class="flex w-full h-min justify-center items-center">
                                            <form method="POST" name="myform" action="{{ route('games.rate', ['slug'=>$game['slug']]) }}">
                                            @csrf
                                                <input type="hidden" name="title" id="title" value="{{ $game['name'] }}"/>
                                                <input type="hidden" id="rating" name="rating" value="">
                                                <div x-data="
                                                    {
                                                        rating: 0,
                                                        hoverRating: 0,
                                                        ratings: [{'amount': 1, 'label':'Terrible'}, {'amount': 2, 'label':'Bad'}, {'amount': 3, 'label':'Okay'}, {'amount': 4, 'label':'Good'}, {'amount': 5, 'label':'Great'}],
                                                        rate(amount) {
                                                            if (this.rating == amount) {
                                                                this.rating = 0;
                                                            }
                                                            else {
                                                                this.rating = amount;
                                                                document.getElementById('rating').value = this.rating;
                                                                document.myform.submit();
                                                            }
                                                            console.log(this.rating);
                                                        },
                                                        currentLabel() {
                                                        let r = this.rating;
                                                        if (this.hoverRating != this.rating) r = this.hoverRating;
                                                        let i = this.ratings.findIndex(e => e.amount == r);
                                                        if (i >=0) {return this.ratings[i].label;} else {return ''};     
                                                        }
                                                    }
                                                    " class="flex flex-col items-center justify-center space-y-0 rounded m-1 w-auto h-min p-0 bg-transparent mx-auto">
                                                    <div class="flex space-x-0 bg-transparent ">
                                                        <template x-for="(star, index) in ratings" :key="index">
                                                            
                                                            <button @click="rate(star.amount)" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
                                                            aria-hidden="true"
                                                            :title="star.label"
                                                            class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                                                            :class="{'text-gray-600': hoverRating >= star.amount, 'text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                                                                <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                </svg>
                                                                
                                                            </button>
                                                            

                                                        </template>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            
                        </div>
                    @endauth

                </div>

                <p class="text-gray-300 mt-2">
                    {{ $game['summary'] }}
                </p>
                
                <div class="mt-12" x-data="{ isTrailerModalVisible: false }">
                    <button
                        @click="isTrailerModalVisible = true"
                        class="flex bg-orange-500 text-gray-900 font-semibold px-4 py-4 hover:bg-orange-600 rounded transition ease-in-out duration-150"
                    >
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>

                    <template x-if="isTrailerModalVisible">
                        <div
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isTrailerModalVisible = false"
                                            @keydown.escape.window="isTrailerModalVisible = false"
                                            class="text-3xl leading-none hover:text-gray-300"
                                        >
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $game['trailer'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div> <!-- end game-details -->

        <div class="game-images border-b border-gray-800" x-data="{ isImageModalVisible: false, image: ''}">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($game['screenshots'] as $screenshot)
                        <div>
                            <a
                                href="#"
                                @click.prevent="
                                    isImageModalVisible = true
                                    image='{{ $screenshot['big'] }}'
                                "
                            >
                                <img src="{{ $screenshot['big'] }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endforeach
                </div>

                <div
                    style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50"
                    x-show="isImageModalVisible"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    @click="isImageModalVisible = false"
                                    @keydown.escape.window="isImageModalVisible = false"
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

        <div class="similar-games-container border-b border-gray-800">
            <div class="container mx-auto px-4 py-16 block">
                <h2 class="text-4xl font-semibold">Similar Games</h2>
                <div class="similar-games grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                    @foreach ($game['similarGames'] as $games)
                        <x-game-card :game="$games" />
                    @endforeach
                </div><!-- end similar-games -->
            </div> 
        </div> <!-- end similar-games-container -->

        <div class="game-review border-b border-gray-800">
            <div class="container mx-auto px-4 py-16 block">
                <div class="flex flex-row ">
                    <h2 class="text-4xl font-semibold mr-8">Social</h2>
                    <h3 class="text-2xl font-normal py-3 ">Reviews ({{ count($userReviews) }})</h3>
                </div>
                @auth
                    <div class="write-review my-4 px-8">
                        <form method="POST" action="{{ route('games.review', $game['slug']) }}">
                            @csrf
                            <textarea rows="5" cols="60" class="block mt-1 w-full h-40 text-black px-2 py-2 rounded-lg shadow-md" name="review" value="" placeholder="Write a review..." required></textarea>
                            <input type="hidden" name="type" value="game" />
                            <input type="hidden" name="game_id" value="{{$game['id']}}" /> 
                            <div class="flex justify-end mt-4">
                                <input type="submit" class="mt-1 flex inline-flex items-center bg-transparent hover:bg-gray-300 border-2 text-sm md:text-xs  text-gray-300 hover:text-gray-800 rounded font-semibold px-10 py-2 transition ease-in-out duration-150" style="border-color: #3c8b84;font-size: 0.8em;" value="Add Review" />
                            </div>
                        </form>
                    </div>
                @endauth

                <div class="review-box box-border border border-white border-opacity-25 border-l-0 border-r-0 h-auto w-full px-8 mt-4">
                    @if ($userReviews != null) 
                        @foreach ($userReviews as $review)
                        <?php 
                            $user_avatar = 'https://ui-avatars.com/api/?name='. $review['user_name'];
                       
                        ?>

                        <div class="my-8 w-full border border-gray-600 rounded-lg shadow-2xl">
                            <div class="review-header flex flex-row items-center content-center w-full py-2 px-2">
                                <div class="avatar mr-5 mt-2 md:mt-0 w-16">
                                    <a href="#">
                                        <img src="{{ $user_avatar }}" alt="avatar" class="rounded-full w-14 h-14">
                                    </a>
                                </div>
                                <div class="info w-full">
                                    <div class="rating_wrapper w-full flex flex-wrap items-baseline justify-start">
                                        <h3 class="font-bold">
                                            A review by {{ $review['user_name'] }}.
                                        </h3>
                                        <div class="rounded rating px-8 ml=14 inline-flex text-sm items-center justify-items-center bg-transparent ">
                                            <svg class="fill-current text-orange-500 w-4 mr-1" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg> 
                                            {{ rand(5,9) }}
                                        </div>
                                    </div>
                                    <h5 class="text-xs">Written by {{ $review['user_name'] }} on {{ $review['created_at'] }}</h5>
                                </div>   
                            </div>
                            <div class="content w-min h-auto">
                            <p class="overflow-ellipsis overflow-hidden break-words px-4 py-4">{{ $review['review'] }}</p>
                        </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div> <!-- end game-review -->
    </div>
@endsection
