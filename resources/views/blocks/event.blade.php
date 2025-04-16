@if ($event_signpost)
  @if ($heading)
    <h2 class="wp-block-heading">{{ $heading }}</h2>
  @endif

  <x-event-card class="my-12 2xl:my-16" :event="$event_signpost" />
@elseif($hide_when_empty)
@else
  @if ($heading)
    <h2 class="wp-block-heading">{{ $heading }}</h2>
  @endif

  <p class="rounded-small bg-gold-light p-8 text-center">
    {{ $empty_message ?: 'No matching events  found.' }}
  </p>
@endif
