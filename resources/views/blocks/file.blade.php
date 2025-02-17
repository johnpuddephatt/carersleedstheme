@if ($file)
  <a href="{{ $file['url'] }}" download
    class="{{ $block->classes }} wp-block not-prose group my-4 flex items-center gap-2 rounded-small bg-green-light p-6 !no-underline md:my-8 md:gap-4 md:p-8"
    style="{{ $block->inlineStyle }}; font-size: 1em;">
    <x-icon.document class="size-10 text-green" />
    <div>
      <h3 class="type-sm md:type-md mb-1">{{ $name ?: $file['title'] }}</h3>
      <div class="font-normal leading-snug">{{ $description ?: $file['description'] }}</div>
    </div>
    <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
      <x-icon.card-arrow class="h-6 w-6 rotate-90 text-green" />
    </div>
  </a>
@elseif($block->preview)
  <div class="rounded-small bg-green-light p-8">
    Add a file to get started.
  </div>
@endif
