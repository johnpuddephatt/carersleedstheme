@php
  if (get_field('display_default_contact_info') || $block instanceof stdClass) {
      $title = get_field('contact_title', 'option');
      $subtitle = get_field('contact_subtitle', 'option');
      $blocks = get_field('contact_blocks', 'option');
      $more_link = get_field('contact_link', 'option');
  }
@endphp
@if ($blocks ?? false)
  <div
    class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} not-prose mx-auto my-16 bg-blue-light px-4 py-12 md:px-8 md:py-16 2xl:my-24 2xl:py-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl relative mb-8 text-center font-semibold text-blue-dark md:mb-12">{{ $title }}</h2>
    @endif
    @if ($subtitle)
      <div class="type-sm relative -mt-6 mb-8 text-center !font-semibold text-blue-dark md:mb-16">{{ $subtitle }}
      </div>
    @endif

    <div class="flex flex-row flex-wrap justify-center gap-4 md:gap-8 lg:gap-12">

      @foreach ($blocks as $block_item)
        <div
          class="{{ $block->block->align ? 'flex-row items-start' : 'flex-col' }} group relative flex w-full max-w-xl gap-4 rounded-medium bg-white p-4 md:h-56 md:min-w-96 md:p-8">
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

            @if ($block_item['link'])
              <x-button class="mt-4 !px-6 !py-1 after:absolute after:inset-0 after:block" :label="$block_item['link']['title']"
                :onclick="$block_item['link'] === 'https://direct.lc.chat/19064207/' ? 'window.LC_API.open_chat_window();return false;' : null :url="$block_item['link']['url']" :target="$block_item['link']['target']" />
            @endif
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
