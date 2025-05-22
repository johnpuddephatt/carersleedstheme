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

    <div x-data="{}" class="container mb-8 space-y-4 md:space-y-8 lg:max-w-5xl">

      <div class="grid gap-4 md:grid-cols-3">

        @foreach (get_field('event_types', 'option') as $type)
          <a class="{{ isset($_GET['type']) && $_GET['type'] == $type['slug'] ? 'bg-blue-light' : null }} overflow-hidden rounded-medium bg-gold-light"
            href="{{ setParam('type', $type['slug']) }} ">

            {!! wp_get_attachment_image($type['image'], 'landscape', null, [
                'class' => 'block bg-gold"',
            ]) !!}
            <div class="p-6">
              <h3 class="type-md mb-2">{{ $type['title'] }}</h3>
              <p>
                {{ $type['description'] }}
              </p>
            </div>
          </a>
        @endforeach

      </div>

      <h2 class="type-lg !mt-12 text-center text-blue-dark">Find an event near you</h2>
      <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'north' ? 'bg-blue-light' : null" :url="setParam('location', 'north')" label="North Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'south' ? 'bg-blue-light' : null" :url="setParam('location', 'south')" label="South Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'east' ? 'bg-blue-light' : null" :url="setParam('location', 'east')" label="East Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'west' ? 'bg-blue-light' : null" :url="setParam('location', 'west')" label="West Leeds" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'leeds-city-centre' ? 'bg-blue-light' : null" :url="setParam('location', 'leeds-city-centre')" label="Leeds City Centre" />
        <x-button-pill :class="isset($_GET['location']) && $_GET['location'] == 'online' ? 'bg-blue-light' : null" :url="setParam('location', 'online')" label="Online" />

      </div>

      <h2 class="type-lg !mt-12 text-center text-blue-dark">Upcoming events</h2>

    </div>
  @else
    <div class="container my-16 space-y-4 md:mb-24 md:space-y-8 lg:max-w-5xl">

      <a href="{{ get_permalink(get_option('page_for_events')) }}">&larr; Back to all events</a>
      @if (($_GET['location'] ?? false) == 'online')
        <h1 class="type-xl text-blue-dark">Online events</h1>
      @else
        {{-- <a href="{{ setParam('location', null) }}">&larr; Clear location filter</a> --}}
        <h1 class="type-xl text-blue-dark">{{ ucfirst($_GET['type'] ?? 'All') }} events in
          {{ ucwords(str_replace('-', ' ', $_GET['location'] ?? '')) }}
          {{ strpos($_GET['location'] ?? '', 'leeds') !== 0 ? 'Leeds' : '' }}</h1>

        </h1>
      @endif

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
        'base' => getCurrentUrl(),
        'prev_text' => '<',
        'next_text' => '>',
        'total' => ceil($event_count / $per_page),
        'add_fragment' => '#events',
    ]) !!}
  </div>
@endsection
