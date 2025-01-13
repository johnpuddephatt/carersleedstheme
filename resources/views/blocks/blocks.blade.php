@if ($blocks)
  <div
    class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} not-prose mx-auto my-16 bg-blue-light px-8 py-16 2xl:my-24 2xl:py-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-12 text-center font-semibold">{{ $title }}</h2>
    @endif
    @if ($subtitle)
      <div class="type-md -mt-6 mb-16 text-center !font-semibold">{{ $subtitle }}</div>
    @endif

    <div class="flex flex-row flex-wrap justify-center gap-8 lg:gap-12">

      @foreach ($blocks as $block_item)
        <div
          class="{{ $block->block->align ? 'flex-row items-start' : 'flex-col' }} flex h-56 w-full min-w-96 max-w-xl gap-4 rounded-3xl bg-white p-8">
          <div class="h-12 w-12 rounded-full bg-blue-bright p-2.5">
            @if ($block_item['icon'])
              @svg($block_item['icon'], 'h-7 w-7 text-white ')
            @endif
          </div>

          <div>
            <div class="mb-4 text-2xl">
              {!! $block_item['heading'] !!}
            </div>
            <div class="text-lg">
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
  <div class="rounded-xl bg-beige-light p-8">
    Add a block to get started.
  </div>
@endif
