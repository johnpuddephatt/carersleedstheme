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
  {!! $content !!}

  <div id="events" class="container mb-16 space-y-4 md:mb-24 md:space-y-8 lg:max-w-5xl">
    {{-- <p>{{ $event_count }} events @ {{ $per_page }} per page = {{ ceil($event_count / $per_page) }} pages</p> --}}

    <div x-data="{ events: [] }" x-init="() => {
        fetch('/wp-json/tribe/events/v1/events').then(response => response.json()).then(data => {
            console.log(data);
            this.events = data
        })
    }">

    </div>

    <div>
      <x-button :class="!isset($_GET['category']) || $_GET['category'] == 'all' ? 'bg-blue-light' : null" :url="setParam('category', 'all')" label="All categories" />
      <x-button :class="isset($_GET['category']) && $_GET['category'] == 'bereavement' ? 'bg-blue-light' : null" :url="setParam('category', 'bereavement')" label="Bereavement" />
    </div>

    <div>
      <x-button :class="!isset($_GET['location']) || $_GET['location'] == 'all' ? 'bg-blue-light' : null" :url="setParam('location', 'all')" label="All" />
      <x-button :class="isset($_GET['location']) && $_GET['location'] == 'south' ? 'bg-blue-light' : null" :url="setParam('location', 'south')" label="South" />
      <x-button :class="isset($_GET['location']) && $_GET['location'] == 'centre' ? 'bg-blue-light' : null" :url="setParam('location', 'centre')" label="City centre" />

    </div>

    <div class="justify-between">
      <div>
        <x-button :class="!isset($_GET['date']) || $_GET['date'] == 'all' ? 'bg-blue-light' : null" :url="setParam('date', 'all')" label="All dates" />
        <x-button :class="isset($_GET['date']) && $_GET['date'] == 'this_week' ? 'bg-blue-light' : null" :url="setParam('date', 'this_week')" label="This week" />
        <x-button :class="isset($_GET['date']) && $_GET['date'] == 'next_week' ? 'bg-blue-light' : null" :url="setParam('date', 'next_week')" label="Next week" />
      </div>

      <x-button :class="isset($_GET['category']) && $_GET['category'] == 'all' ? 'bg-blue-light' : null" :url="setParam('category', 'all')" label="All categories" />
    </div>
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
