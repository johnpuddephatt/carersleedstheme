@if ($event_signpost)
  <x-event-card class="my-12 2xl:my-16" :event="$event_signpost" />
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Select an event to get started.
  </div>
@endif
