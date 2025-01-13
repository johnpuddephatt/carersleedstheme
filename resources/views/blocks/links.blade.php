@if ($links)

  <div
    class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} not-prose mx-auto my-16 2xl:my-24"
    style="{{ $block->inlineStyle }}">

    @if ($title)
      <h2 class="type-xl mb-12 text-blue-dark">{{ $title }}</h2>
    @endif

    <div class="grid grid-cols-3 gap-x-8 gap-y-6 pb-12">

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

    <div class="text-center">
      @if ($more_link)
        <x-button :label="$more_link['title']" :url="$more_link['url']" :target="$more_link['target']" />
      @endif
    </div>

  </div>
@elseif($block->preview)
  <div class="rounded-xl bg-beige-light p-8">
    Add some links to get started.
  </div>
@endif
