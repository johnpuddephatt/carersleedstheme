{{-- @extends('layouts.app') @section('content') --}}
<div class="pt-32">
  <a class="type-md mb-4 inline-block text-blue" href="{{ get_permalink(get_option('page_for_events')) }}">Events
    &rsaquo;
  </a>
  <h1 class="type-2xl mb-2 text-blue-dark md:mb-4">{!! $series->post_title !!}</h1>
</div>

<div id="events" class="grid gap-4 pt-16">

  @foreach ($events as $event)
    <x-event-card :event="$event" class="mb-4" />
  @endforeach
</div>

<div class="mt-12 text-right text-xl">

  {{ str_replace(9999, '%#%', esc_url(get_pagenum_link(9999))) }}
  {!! paginate_links([
      'base' => get_permalink(get_queried_object_id()) . 'page/%#%/',
  
      'prev_text' => '<',
      'next_text' => '>',
  
      'total' => ceil($event_count / $per_page),
      'current' => max(1, get_query_var('paged')),
  ]) !!}

</div>
{{-- @endsection --}}
