<div class="not-prose wp-block {{ $block->classes }} relative mx-auto" style="{{ $block->inlineStyle }}">

  <div
    class="bg-{{ $behind_color ?? 'transparent' }} absolute -top-16 left-1/2 -z-10 h-[calc(50%+4rem)] w-screen !max-w-none -translate-x-1/2">
  </div>

  {!! $block->preview || ($type == 'link' && !$link) ? '<div' : '<a' !!} href="{{ $type == 'page' ? get_the_permalink($page) : $link }}"
  class="bg-{{ $background_colour }} {{ $block->block->align == 'full' ? '' : 'mx-4  rounded-3xl my-16' }} block cursor-pointer overflow-hidden !font-normal">
  <div class="group relative flex items-center">
    <div class="max-w-[50%] overflow-hidden">
      @if ($type == 'page')
        {!! get_the_post_thumbnail($page, 'landscape', [
            'sizes' => '16rem',
            'class' =>
                ' h-auto group-hover:scale-105 ease-in-out transition-transform duration-1000' .
                ($block->block->align ? ' w-96' : ' w-64'),
        ]) !!}
      @elseif ($image)
        {!! wp_get_attachment_image($image, 'landscape', false, [
            'sizes' => '16rem',
            'class' => ' h-auto group-hover:scale-105 ease-in-out  transition-transform duration-1000 w-96',
        ]) !!}
      @endif
    </div>
    <div class="{{ $block->block->align == 'full' ? 'max-w-xl text-xl' : 'max-w-lg' }} px-6 py-4">
      <h2 class="{{ $block->block->align == 'full' ? 'type-lg mb-4' : 'type-md mb-2' }}">
        {{ $type == 'page' ? get_the_title($page) : $heading }}
      </h2>
      <div>{!! $type == 'page' ? get_the_excerpt($page) : $content !!}</div>
      @if ($type == 'page' || $link)
        <div class="{{ $block->block->align == 'full' ? 'mt-4' : 'mt-2' }} font-semibold">Read more</div>
      @endif

    </div>
  </div>
  {!! $block->preview || ($type == 'link' && !$link) ? '</div>' : '</a>' !!}
</div>
