@props(['post', 'show_image' => true, 'show_excerpt' => true, 'variant' => 'default'])

<a href="{{ get_permalink($post->ID) }}"
  {{ $attributes->merge([
      'class' =>
          'not-prose font-normal group relative flex flex-row items-center  overflow-hidden ' .
          match ($variant) {
              'outlined'
                  => 'after:absolute after:bottom-0 after:left-0 after:right-0 after:block after:h-[2px] after:bg-blue-bright after:transition-all hover:after:h-[3px]',
              default
                  => '  rounded-3xl bg-green-light after:absolute after:right-1 after:top-2 after:block after:size-8 after:rounded-full after:bg-green',
          },
  ]) }}>
  @if ($show_image ?? false)
    <div class="aspect-square w-48 flex-none overflow-hidden bg-blue-light">
      @if (has_post_thumbnail($post->ID))
        <img src="{{ get_the_post_thumbnail_url($post->ID, 'square') }}"
          alt="{{ get_the_post_thumbnail_caption($post->ID) }}"
          class="h-full w-full object-cover transition duration-1000 group-hover:scale-105">
      @endif
    </div>
  @endif

  <div class="flex-1 py-8 pl-4 lg:pl-8 lg:pr-12">
    <div class="mb-1 text-blue">
      {{ get_the_date(null, $post->ID) }}</div>

    <h3 class="type-md text-balance">{{ $post->post_title }}
    </h3>
    @if ($show_excerpt)
      <p class="mt-3 max-w-3xl">{!! get_the_excerpt($post->ID) !!}</p>
    @endif

  </div>
  {{-- 
  <x-icon.card-arrow
    class="!size-8 flex-none -translate-x-full text-blue-bright opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100" /> --}}

</a>
