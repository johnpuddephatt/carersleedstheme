<div class="not-prose {{ $block->style == 'cards' ? 'grid md:grid-cols-2 gap-x-8 gap-y-16' : 'grid gap-2' }}">

  @foreach ($pages as $page)
    @if ($block->style == 'links')
      <a href="{{ $page['link'] }}">{!! $page['title'] !!}</a>
    @elseif ($block->style == 'compact')
      <x-page-card-compact :url="$page['link']" :title="$page['title']" />
    @elseif ($block->style == 'cards')
      <x-page-card :url="$page['link']" :title="$page['title']" :image="$page['image']" />
    @endif
  @endforeach

</div>
