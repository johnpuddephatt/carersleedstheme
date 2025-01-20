@props(['event', 'variant' => 'default'])

<a href="{{ get_permalink($event->ID) }}"
  {{ $attributes->merge([
      'class' =>
          'not-prose group relative flex items-center overflow-hidden rounded-3xl !no-underline  ' .
          match ($variant) {
              'outlined' => 'border-2 border-gold',
              default
                  => ' bg-gold-light after:absolute after:right-1 after:top-2 after:block after:size-6 md:after:size-8 after:rounded-full after:bg-gold',
          },
  ]) }}>

  @if (has_post_thumbnail($event->ID, 'square'))
    <div class="h-full w-32 flex-none overflow-hidden bg-gold md:w-48">

      {!! get_the_post_thumbnail($event->ID, 'square', [
          'sizes' => '25vw',
          'class' => ' aspect-square h-full w-full object-cover transition duration-1000 group-hover:scale-105',
      ]) !!}
    </div>
  @endif
  <div class="py-2 pl-2 pr-4 md:py-4 md:pl-4 md:pr-12 lg:pl-8">
    <h3 class="type-sm md:type-md mb-1 text-balance !text-black">{{ $event->post_title }}</h3>
    <div class="leading-snug">
      {{ tribe_get_start_date($event->ID, false, get_option('date_format') . '  –  ' . get_option('time_format')) }}
    </div>
  </div>
</a>
