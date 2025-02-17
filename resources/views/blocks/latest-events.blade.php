@if ($events)
  <div
    class="wp-block not-prose {{ $block->classes }} bg-{{ $background_colour ?? 'transparent' }} {{ $block->block->align ? 'container' : null }} relative z-10 mx-auto my-16 px-4 2xl:my-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-12 text-center text-blue-dark md:text-left">{{ $title }}</h2>
    @endif

    <div class="{{ $block->block->align ? 'md:grid-cols-2' : null }} mb-12 grid gap-4 md:gap-x-12 md:gap-y-8">
      @foreach ($events as $event)
        <x-event-card :event="$event" />
      @endforeach
    </div>

    <div class="text-center">
      @if ($read_more_link)
        <x-button :label="$read_more_link['title']" :url="$read_more_link['url']" :target="$read_more_link['target']" />
      @endif
    </div>
  </div>
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Select events to get started.
  </div>
@endif
