@if ($blocks)
  <div
    class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} not-prose mx-auto my-16 bg-blue-light px-8 py-12 md:py-16 2xl:my-24 2xl:py-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-8 text-center font-semibold md:mb-12">{{ $title }}</h2>
    @endif
    @if ($subtitle)
      <div class="type-md -mt-6 mb-8 text-center !font-semibold md:mb-16">{{ $subtitle }}</div>
    @endif

    <div class="flex flex-row flex-wrap justify-center gap-4 md:gap-8 lg:gap-12">

      @foreach ($blocks as $block_item)
        <div
          class="{{ $block->block->align ? 'flex-row items-start' : 'flex-col' }} rounded-medium flex w-full min-w-96 max-w-xl gap-4 bg-white p-4 md:h-56 md:p-8">
          <div class="h-12 w-12 rounded-full bg-blue-bright p-2.5">
            @if ($block_item['icon'])
              @svg($block_item['icon'], 'h-7 w-7 text-white ')
            @endif
          </div>

          <div>
            <div class="type-md md:type-lg mb-1 !font-normal md:mb-4">
              {!! $block_item['heading'] !!}
            </div>
            <div class="type-sm !font-normal">
              {!! $block_item['subheading'] !!}</div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center">
      @if ($more_link)
        <x-button :label="$more_link['title']" :url="$more_link['url']" :target="$more_link['target']" />
      @endif
    </div>

  </div>
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Add a block to get started.
  </div>
@endif
