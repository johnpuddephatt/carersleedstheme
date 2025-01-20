@if ($links)

  <div
    class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} not-prose relative my-16 px-4 md:px-0 2xl:my-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-12 text-center text-blue-dark md:text-left">{{ $title }}</h2>
    @endif

    <div class="{{ $block->style == 'default' ? 'gap-8' : 'gap-4' }} grid md:grid-cols-3 md:gap-8">

      @foreach ($links as $link)
        @if ($link['acf_fc_layout'] == 'manual_link')
          @php($url = $link['link'])
          @php($title = $link['title'])
          @php($image = $link['image'])
        @elseif ($link['acf_fc_layout'] == 'page_or_post')
          @php($url = get_the_permalink($link['page']))
          @php($title = $link['override_details'] && $link['title'] ? $link['title'] : get_the_title($link['page']))
          @php($image = $link['override_details'] && $link['image'] ? $link['image'] : get_post_thumbnail_id($link['page']))
        @endif

        @if ($block->style == 'default')
          <x-page-card :url="$url" :title="$title" :image="$image" />
        @elseif ($block->style == 'compact')
          <x-page-card-compact :url="$url" :title="$title" :image="$image" />
        @endif
      @endforeach
    </div>
    @if ($more_link)
      <div class="pt-12 text-center">
        <x-button :label="$more_link['title']" :url="$more_link['url']" :target="$more_link['target']" />
      </div>
    @endif

  </div>
@elseif($block->preview)
  <div class="rounded-xl bg-beige-light p-8">
    Add some links to get started.
  </div>
@endif
