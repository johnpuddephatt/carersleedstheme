{{--
  Template Name: Events Template
--}}
@php
  function setParam($param, $value)
  {
      return '?' . http_build_query(array_merge($_GET, [$param => $value]));
  }
@endphp

@extends('layouts.app') @section('content')
  @if (!(isset($_GET['type']) || isset($_GET['location'])))
    {!! $content !!}

    <div x-data="{}" class="container mb-16 space-y-4 md:mb-24 md:space-y-8 lg:max-w-5xl">
      {{-- <p>{{ $event_count }} events @ {{ $per_page }} per page = {{ ceil($event_count / $per_page) }} pages</p> --}}

      {{-- <div>
      <x-button :class="!isset($_GET['category']) || $_GET['category'] == 'all' ? 'bg-blue-light' : null" :url="setParam('category', 'all')" label="All categories" />
      <x-button :class="isset($_GET['category']) && $_GET['category'] == 'bereavement' ? 'bg-blue-light' : null" :url="setParam('category', 'bereavement')" label="Bereavement" />
    </div> --}}

      <div class="grid gap-4 md:grid-cols-3">
        <a class="{{ isset($_GET['type']) && $_GET['type'] == 'social' ? 'bg-blue-light' : null }} overflow-hidden rounded-medium bg-gold-light"
          href="{{ setParam('type', 'social') }} ">
          <img src="" class="block aspect-[2] bg-gold" />
          <div class="p-6">
            <h3 class="type-md mb-2">Socials & meet-ups</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
            </p>
          </div>
        </a>

        <a class="{{ isset($_GET['type']) && $_GET['type'] == 'workshop' ? 'bg-blue-light' : null }} overflow-hidden rounded-medium bg-gold-light"
          href="{{ setParam('type', 'workshop') }} ">

          <img src="" class="block aspect-[2] bg-gold" />
          <div class="p-6">
            <h3 class="type-md mb-2">Workshops</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
            </p>
          </div>
        </a>

        <a class="{{ isset($_GET['type']) && $_GET['type'] == 'advice' ? 'bg-blue-light' : null }} overflow-hidden rounded-medium bg-gold-light"
          href="{{ setParam('type', 'advice') }} ">
          <img src="" class="block aspect-[2] bg-gold" />
          <div class="p-6">
            <h3 class="type-md mb-2">Drop-in advice</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
            </p>
          </div>
        </a>
      </div>

      <h2 class="type-lg !mt-12 text-center">Find an event near you</h2>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
        <x-button-pill :class="!isset($_GET['location']) || $_GET['location'] == 'all' ? 'bg-blue-light' : null" :url="get_permalink(get_option('page_for_events'))" label="All" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'south' ? 'bg-blue-light' : null" :url="setParam('location', 'south')" label="South Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'north' ? 'bg-blue-light' : null" :url="setParam('location', 'north')" label="North Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'east' ? 'bg-blue-light' : null" :url="setParam('location', 'east')" label="East Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'west' ? 'bg-blue-light' : null" :url="setParam('location', 'west')" label="West Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'centre' ? 'bg-blue-light' : null" :url="setParam('location', 'centre')" label="City centre" />

      </div>

      {{-- <div class="justify-between">
      <div>
        <x-button :class="!isset($_GET['date']) || $_GET['date'] == 'all' ? 'bg-blue-light' : null" :url="setParam('date', 'all')" label="All dates" />
        <x-button :class="isset($_GET['date']) && $_GET['date'] == 'this_week' ? 'bg-blue-light' : null" :url="setParam('date', 'this_week')" label="This week" />
        <x-button :class="isset($_GET['date']) && $_GET['date'] == 'next_week' ? 'bg-blue-light' : null" :url="setParam('date', 'next_week')" label="Next week" />
      </div> 

    </div> --}}

    </div>
  @else
    <div class="container my-16 space-y-4 md:mb-24 md:space-y-8 lg:max-w-5xl">

      <a href="{{ get_permalink(get_option('page_for_events')) }}">&larr; Back to all events</a>
      <h1 class="type-xl">{{ ucfirst($_GET['type'] ?? 'All') }} events in {{ ucfirst($_GET['location'] ?? '') }} Leeds
      </h1>

    </div>
  @endif

  <div id="events" class="container mb-16 space-y-4 md:mb-24 md:space-y-8 lg:max-w-5xl">

    @if (!$events)
      <x-alert type="warning" class="lg:max-w-5xl">
        {!! __('Sorry, no events were found.', 'sage') !!}
      </x-alert>
    @endif

    @foreach ($events as $event)
      <x-event-card :event="$event" />
    @endforeach

    {!! paginate_links([
        'prev_text' => '<',
        'next_text' => '>',
        'total' => round($event_count / $per_page),
        'add_fragment' => '#events',
    ]) !!}
  </div>
@endsection
