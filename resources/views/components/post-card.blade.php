@props(['post', 'show_image' => true, 'show_excerpt' => true, 'variant' => 'default'])

<a href="{{ get_permalink($post->ID) }}"
  {{ $attributes->merge([
      'class' =>
          'not-prose font-normal min-h-32 md:min-h-48 group relative flex flex-row items-center  overflow-hidden ' .
          match ($variant) {
              'outlined'
                  => 'after:absolute after:bottom-0 after:left-0 after:right-0 after:block after:h-[2px] after:bg-blue-bright after:transition-all hover:after:h-[3px]',
              default
                  => '  rounded-medium bg-green-light after:absolute after:right-1 after:top-2 after:block md:after:size-8 after:size-6 after:rounded-full after:bg-green',
          },
  ]) }}>
  @if ($show_image ?? false)
    <div class="h-full w-32 max-w-[30%] flex-none overflow-hidden bg-blue-light md:w-48">
      {!! get_the_post_thumbnail($post->ID, 'square', [
          'sizes' => '25vw',
          'class' => ' aspect-square h-full w-full object-cover transition duration-1000 group-hover:scale-105',
      ]) !!}
    </div>
  @endif

  <div class="{{ $show_image ? 'pl-2' : '!px-8' }} flex-1 py-2 md:pl-4 lg:pl-8 lg:pr-12">
    <div class="mb-1 leading-snug text-blue">
      {{ get_the_date(null, $post->ID) }}</div>

    <h3 class="type-sm md:type-md text-balance">{{ $post->post_title }}
    </h3>
    @if ($show_excerpt)
      <p class="mt-3 hidden max-w-3xl leading-snug md:block">{!! wp_trim_words(get_the_excerpt($post->ID), 20) !!}</p>
    @endif

  </div>
  {{-- 
  <x-icon.card-arrow
    class="!size-8 flex-none -translate-x-full text-blue-bright opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100" /> --}}

</a>
