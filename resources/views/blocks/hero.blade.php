<div
  class="wp-block {{ $block->classes }} bg-{{ $background_colour }} {{ $block->block->align == 'full' ? '' : ' mb-8 xl:my-16 2xl:my-24' }} {{ $block->block->align == 'wide' ? 'xl:rounded-big' : '' }} {{ !$block->block->align ? 'md:rounded-medium' : '' }} not-prose {{ $block->style == 'home' ? '!md:-mt-px' : '' }} relative mx-auto overflow-hidden"
  style="{{ $block->inlineStyle }}">

  <div
    class="{{ $block->block->align == 'full' ? 'container md:gap-6' : 'pl-4 md:pl-8' }} relative flex flex-col-reverse items-center md:grid md:grid-cols-2">
    <div
      class="{{ $block->block->align == 'full' ? 'pb-16 md:py-16  max-w-xl' : ' pb-8 md:pt-8 lg:p-16' }} relative z-10 w-full">
      <h1 class="type-xl mb-4 text-blue-dark md:mb-6">{{ $heading }}</h1>
      <div class="type-sm !font-normal">{!! $content !!}</div>
      @if ($buttons)
        <div class="mt-6 flex flex-wrap gap-2 md:mt-10">
          @foreach ($buttons as $button)
            @if (is_array($button['link']))
              <x-button :label="$button['link']['title']" :url="$button['link']['url']" :target="$button['link']['target']" />
            @endif
          @endforeach
        </div>
      @endif
    </div>
    <div class="{{ $block->block->align == 'full' ? 'md:py-8 py-4 w-full' : null }}">
      @if ($image)

        @if ($block->style == 'home')
          <svg xmlns="http://www.w3.org/2000/svg" width="195.17" height="149.1"
            class="absolute -right-4 -top-0 h-auto w-[calc(50%+3rem)] 2xl:w-[calc(50%+6rem)]"
            viewBox="0 0 195.17 149.1">
            <path fill="#e4d3c4"
              d="M81.33 0c9.93 4 23.74 16.68 31.81 34.61 3.37 7.49 5.24 28.28-10 32.82a26.79 26.79 0 0 1-18.37-1.13c-5.85-2.52-11.68-5.83-18-5.71-13.41.26-21.86 14.95-34.48 19.49A24.21 24.21 0 0 1 3.51 44.51c6.21-10 19-14.59 24.7-24.9 3.52-6.4 4.25-13.43 8.38-19.46" />
            <path fill="#d18080"
              d="M194.84 96.8c.11-7.57-.24-17.68-.53-25.35-.32-8.39-1.2-17.65-9.55-22.13-5.42-2.91-11.34-4-17.43-4.4-9-.54-71.15-.72-79.7 2.29-11.7 4.13-14.47 14.25-16 25.47-1.31 9.79-.32 35.9-.25 46 .27 39.16 48.88 29.43 69.68 29.16 18.66-.24 36.47 1.79 45.37-3 11.65-6.18 8.22-34.18 8.41-48.04Z" />
            <circle cx="10.27" cy="103.33" r="7.56" fill="#eebdbc" />
          </svg>

          {!! wp_get_attachment_image($image, 'landscape', false, [
              'sizes' => '75vw, (min-width: 800px) 50vw, (min-width: 1200px) 30vw',
              'class' =>
                  'w-80 ml-auto translate-x-8 md:translate-x-0 md:w-full h-auto mt-12 md:mb-24 clip-oval md:clip-landscape',
          ]) !!}
        @else
          {!! wp_get_attachment_image($image, 'square', false, [
              'sizes' => '75vw, (min-width: 800px) 50vw, (min-width: 1200px) 30vw',
              'class' =>
                  ' w-80 md:w-full h-auto ml-auto ' .
                  match ($block->style) {
                      'default' => $block->block->align == 'full' ? 'clip-oval' : 'clip-oval md:clip-oval-part',
                      'alternative' => $block->block->align == 'full' ? 'clip-oval-2' : 'clip-oval-2 md:clip-oval-part-2',
                  },
          ]) !!}
        @endif
      @endif
    </div>
  </div>
</div>

@if ($block->style == 'home')
  <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-0 hidden h-auto w-48 -translate-y-8 md:block"
    viewBox="0 0 51.1 150.17">
    <path fill="#ffd19e"
      d="M51.1 0C40.5 1.97 31.13 10.1 28.03 20.48c-3.27 10.94.04 22.86-2.14 34.07-3.51 18.04-20.38 31-24.84 48.84-3.79 15.12 2.94 32.29 15.98 40.83 9.93 6.5 22.96 7.62 34.07 3.61V0Z" />
  </svg>
@endif
