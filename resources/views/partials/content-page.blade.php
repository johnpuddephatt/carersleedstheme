<article @php(post_class())>
  <div class="container mx-auto xl:max-w-5xl 2xl:max-w-6xl">
    <div class="flex flex-col gap-12 pb-12 lg:flex-row-reverse lg:justify-end lg:pb-32">

      <div
        class="{{ $toc ? 'max-lg:bg-blue-light xl:pt-16 max-lg:p-4 ' : null }} max-w-screen-sm max-lg:rounded-medium lg:w-48">
        @if ($toc)
          <div class="mx-auto pt-4 lg:sticky lg:top-12 lg:border-t lg:border-blue-bright">
            {!! $toc !!}
          </div>
        @endif
      </div>

      <div class="flex-1 lg:px-0">
        <div class="page-content prose xl:prose-lg" id="overview">
          {!! $content !!}
        </div>
      </div>
    </div>
  </div>
</article>

@if (get_field('show_exit'))
  <a href="{{ get_field('exit_url', 'option') ?? 'https://www.bbc.co.uk/weather/2644688' }}"
    class="type-md sticky bottom-6 right-0 z-50 mb-8 ml-auto flex w-64 items-center gap-2 rounded-l-full bg-blue-light px-6 py-4 shadow-lg transition duration-300 hover:bg-blue hover:text-white">
    Leave this page
    <x-icon.card-arrow class="h-6 w-6" />
  </a>
@endif
