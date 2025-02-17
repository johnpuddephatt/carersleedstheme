@if ($link && $title)
  <a href="{{ $link }}"
    class="{{ $block->classes }} wp-block not-prose not-prose group my-4 flex items-center gap-2 rounded-small bg-beige p-6 !no-underline md:my-8 md:p-8"
    style="{{ $block->inlineStyle }}; font-size: 1em;">
    <div>
      <h3 class="type-sm md:type-md mb-1">{{ $title }}</h3>
      @if ($description ?? false)
        <div class="font-normal leading-snug">{!! wp_trim_words($description, 22) !!}</div>
      @endif
    </div>
    <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
      <x-icon.card-arrow class="h-6 w-6 text-beige-dark" />
    </div>
  </a>
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Add a link to get started.
  </div>

@endif
