@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-orange-500 uppercase tracking-wide font-semibold pt-16">Popular Games</h2>
        <livewire:popular-games>
        <h2 class="text-orange-500 uppercase tracking-wide font-semibold mt-12">Recently Reviewed</h2>
        <livewire:recently-reviewed>
        <h2 class="text-orange-500 uppercase tracking-wide font-semibold mt-12">Most Anticipated</h2>
        <livewire:most-anticipated>
        <h2 class="text-orange-500 uppercase tracking-wide font-semibold mt-12">Coming Soon</h2>
        <livewire:coming-soon>
    </div>
@endsection
