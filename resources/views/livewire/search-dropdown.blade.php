<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <!--   Search Bar Here   -->
    <input 
        wire:model="search" 
        type="text" 
        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
        placeholder="Search"
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen=true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>
    <!--   Spinner Here   -->
    <div wire:loading class="absolute top-0 right-0 mr-2 mt-2">
        <svg class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50" style="border-right-color: white; border-top-color: white;" viewBox="0 0 24 24"></svg>
    </div>
    @if(strlen($search) > 2)
        <div 
            class="z-50 absolute text-sm bg-gray-800 rounded w-64 mt-4"
            x-show.transition.opacity="isOpen"
        >
            <ul>
                @if ($searchResults->count() > 0)
                   
                    @foreach ($searchResults as $result)
                        @if ($result['media_type'] === 'movie')
                            <li class="border-b border-gray-700">
                                <a 
                                    href="{{ route('movies.show', $result['id']) }}" 
                                    class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                                    @if ($loop->last)
                                        @keydown.tab="isOpen = false"
                                    @endif
                                >
                                    @if($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['title'] }}</span>

                                </a>
                            </li>
                        @elseif ($result['media_type'] === 'tv')
                            <li class="border-b border-gray-700">
                                <a 
                                    href="{{ route('tv.show', $result['id']) }}" 
                                    class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                                    @if ($loop->last)
                                        @keydown.tab="isOpen = false"
                                    @endif
                                >
                                    @if($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['name'] }}</span>

                                </a>
                            </li>
                        @elseif ($result['media_type'] === 'person')
                            <li class="border-b border-gray-700">
                                <a 
                                    href="{{ route('actors.show', $result['id']) }}" 
                                    class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                                    @if ($loop->last)
                                        @keydown.tab="isOpen = false"
                                    @endif
                                >
                                    @if($result['profile_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['profile_path'] }}" alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['name'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @else
                    <div class="px-3 py-3 text-sm">No Result for "{{ $search  }}"</div>
                @endif  
            </ul>
        </div>
    @endif
</div>