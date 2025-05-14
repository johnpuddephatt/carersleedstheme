@props(['event', 'variant' => 'default'])

<a href="{{ get_permalink($event->ID) }}"
  {{ $attributes->merge([
      'class' =>
          'not-prose group relative flex items-center min-h-32 overflow-hidden rounded-medium !no-underline  ' .
          match ($variant) {
              'outlined' => 'border-2 border-gold',
              default
                  => ' bg-gold-light after:absolute after:right-0 after:top-1 md:after:right-1 md:after:top-2 after:block after:size-6 md:after:size-8 after:rounded-full after:bg-gold',
          },
  ]) }}>

  @if (has_post_thumbnail($event->ID, 'square'))
    <div class="h-full w-32 max-w-[30%] flex-none overflow-hidden bg-gold md:w-48">

      {!! get_the_post_thumbnail($event->ID, 'square', [
          'sizes' => '25vw',
          'class' => ' aspect-square h-full w-full object-cover transition duration-1000 group-hover:scale-105',
      ]) !!}
    </div>
  @endif
  <div class="py-2 pl-2 pr-2 md:py-4 md:pl-4 md:pr-12 lg:pl-8">

    <div class="leading-snug">
      {!! tribe_get_start_date($event->ID, false, get_option('date_format')) !!}

      @if (!tribe_event_is_all_day($event->ID))
        &nbsp; &mdash; &nbsp;
        {!! tribe_get_start_date($event->ID, false, get_option('time_format')) !!}

        @if (tribe_get_end_date($event->ID, false, get_option('time_format')) !==
                tribe_get_start_date($event->ID, false, get_option('time_format')))
          -
          {{ tribe_get_end_date($event->ID, false, get_option('time_format')) }}
        @endif
      @endif
    </div>
    <h3 class="type-sm md:type-md mb-3 mt-2 text-balance !text-black">{{ $event->post_title }}</h3>
    @if (tribe_get_venue($event->ID))

      <p class="flex items-start leading-tight">
        <span class="-mt-0.5 mr-1 inline-block rounded-full bg-gold p-0.5 md:mr-2">
          <x-icon.marker class="h-4 w-4 text-white md:h-6 md:w-6" />
        </span>
        {!! tribe_get_venue($event->ID) !!}
        @if (tribe_get_address($event->ID))
          {!! ', ' . tribe_get_address($event->ID) !!}
        @endif
    @endif
  </div>
</a>
