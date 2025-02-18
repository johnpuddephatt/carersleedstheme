@if ($number ?? false)
  <a href="tel:{{ preg_replace('/[^0-9]/', '', $number) }}"
    class="{{ $block->classes }} wp-block not-prose not-prose group my-4 flex items-center gap-2 rounded-small bg-beige p-6 !no-underline md:my-8 md:p-8"
    style="{{ $block->inlineStyle }}; font-size: 1em;">
    <div class="rounded-full bg-white bg-opacity-60 p-3 transition group-hover:bg-opacity-100">
      <x-icon.phone class="size-8 text-beige-dark" />
    </div>
    <div>
      <h3 class="type-sm md:type-md !leading-none">{{ $title }}</h3>
      <div class="type-sm md:type-md mb-1.5 !font-semibold !leading-none">{{ $number }}</div>
      @if ($description ?? false)
        <div class="font-normal leading-snug">{!! wp_trim_words($description, 22) !!}</div>
      @endif
    </div>
  </a>
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Add a number to get started.
  </div>
@endif
