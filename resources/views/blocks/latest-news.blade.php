@if ($news)
  <div
    class="wp-block {{ $block->classes }} bg-{{ $background_colour ?? 'transparent' }} {{ $block->block->align ? 'container' : null }} not-prose mx-auto my-16 px-8 py-16 2xl:my-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-12 text-blue-dark">{{ $title }}</h2>
    @endif

    <div class="{{ $block->block->align ? 'grid-cols-2' : null }} mb-12 grid gap-12">
      @foreach ($news as $post)
        <x-post-card :post="$post" :show_image="$show_image" :show_excerpt="$show_excerpt" />
      @endforeach
    </div>

    <div class="text-center">
      @if ($read_more_link)
        <x-button :label="$read_more_link['title']" :url="$read_more_link['url']" :target="$read_more_link['target']" />
      @endif
    </div>
  </div>
@endif
