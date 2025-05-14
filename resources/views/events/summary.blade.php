{{-- @extends('layouts.app') @section('content') --}}
<div class="pb-16 pt-32">
  <a class="type-md mb-4 inline-block text-blue" href="{{ get_permalink(get_option('page_for_events')) }}">Events
    &rsaquo;
  </a>
  <h1 class="type-2xl mb-2 text-blue-dark md:mb-4">{!! $series->post_title !!}</h1>
</div>

<div class="grid gap-4">

  @foreach ($events as $event)
    <x-event-card :event="$event" class="mb-4" />
  @endforeach
</div>
{{-- @endsection --}}
