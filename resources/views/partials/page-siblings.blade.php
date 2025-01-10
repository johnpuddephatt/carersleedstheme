@if ($siblings)
  <div class="border-blue-bright border-t">
    <div class="container mx-auto py-16 xl:max-w-5xl 2xl:max-w-6xl">
      <h3 class="pb-8 text-xl font-semibold text-blue">More pages in this section</h3>
      @foreach ($siblings as $page)
        <a class="mb-4 mt-2 flex items-center text-lg text-blue" href="{{ get_permalink($page->ID) }}">
          <hr class="mr-4 inline-block w-6 border border-b-0 border-blue border-opacity-25">
          {!! get_the_title($page->ID) !!}
        </a>
      @endforeach
    </div>
  </div>
@endif
