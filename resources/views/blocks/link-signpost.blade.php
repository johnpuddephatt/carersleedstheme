@if ($link && $title)
  <a href="{{ $link }}"
    class="{{ $block->classes }} wp-block not-prose not-prose group my-8 flex items-center rounded-2xl bg-beige p-8 !no-underline"
    style="{{ $block->inlineStyle }}; font-size: 1em;">
    <div>
      <h3 class="type-md">{{ $title }}</h3>
      @if ($description ?? false)
        <div class="font-normal">{!! wp_trim_words($description, 16) !!}</div>
      @endif
    </div>
    <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
      <x-icon.card-arrow class="h-6 w-6 text-beige-dark" />
    </div>
  </a>
@endif
