@props(['event', 'variant' => 'default'])

<a href="{{ get_permalink($event->ID) }}"
  {{ $attributes->merge([
      'class' =>
          'not-prose group relative flex items-center overflow-hidden rounded-3xl !no-underline  ' .
          match ($variant) {
              'outlined' => 'border-2 border-gold',
              default
                  => ' bg-gold-light after:absolute after:right-1 after:top-2 after:block after:size-8 after:rounded-full after:bg-gold',
          },
  ]) }}>

  @if (has_post_thumbnail($event->ID, 'square'))
    <div class="h-full w-48 flex-none overflow-hidden bg-gold">
      <img src="{{ get_the_post_thumbnail_url($event->ID, 'square') }}"
        alt="{{ get_the_post_thumbnail_caption($event->ID) }}"
        class="aspect-square h-auto w-full transition duration-1000 group-hover:scale-105">
    </div>
  @endif
  <div class="py-8 pl-4 pr-12 lg:pl-8">
    <h3 class="type-md !mb-2 !mt-0 text-balance !text-black">{{ $event->post_title }}</h3>
    <div class="mt-2 !font-normal">
      {{ tribe_get_start_date($event->ID, false, get_option('date_format') . '  –  ' . get_option('time_format')) }}
    </div>
  </div>
</a>
