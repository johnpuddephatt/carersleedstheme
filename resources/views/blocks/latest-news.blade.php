@if ($news)
  <div
    class="wp-block {{ $block->classes }} bg-{{ $background_colour ?? 'transparent' }} {{ $block->block->align ? 'container' : null }} not-prose relative z-10 mx-auto my-16 px-4 xl:px-0 2xl:my-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-12 text-blue-dark">{{ $title }}</h2>
    @endif

    <div class="{{ $block->block->align ? 'md:grid-cols-2' : null }} mb-12 grid gap-4 xl:gap-x-12 xl:gap-y-8">
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
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Select posts to get started.
  </div>
@endif
