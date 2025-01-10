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

  <div id="events" class="container mb-24 space-y-8 lg:max-w-5xl">
    <p>{{ $event_count }} events @ {{ $per_page }} per page = {{ ceil($event_count / $per_page) }} pages</p>

    <div>
      <x-button :class="!isset($_GET['date']) || $_GET['date'] == 'all' ? 'bg-blue-light' : null" :url="setParam('date', 'all')" label="All dates" />
      <x-button :class="isset($_GET['date']) && $_GET['date'] == 'this_week' ? 'bg-blue-light' : null" :url="setParam('date', 'this_week')" label="This week" />
      <x-button :class="isset($_GET['date']) && $_GET['date'] == 'next_week' ? 'bg-blue-light' : null" :url="setParam('date', 'next_week')" label="Next week" />
    </div>

    <x-button :class="isset($_GET['category']) && $_GET['category'] == 'something' ? 'bg-blue-light' : null" :url="setParam('category', 'all')" label="A category" />

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
