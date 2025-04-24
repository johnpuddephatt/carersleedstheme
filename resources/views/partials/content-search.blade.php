<a href="{{ get_permalink() }}"
  class="not-prose {{ get_post_type() === 'post' ? 'bg-green-light after:rounded-full after:bg-green md:min-h-48 md:after:size-8' : 'bg-beige' }} group relative flex min-h-32 flex-row items-center overflow-hidden rounded-medium font-normal after:absolute after:right-1 after:top-2 after:block after:size-6">

  <div class="flex-1 px-8 py-2 md:pl-4 lg:pl-8 lg:pr-12">
    <div class="">
      <div class="mb-1 leading-snug text-blue">
        @includeWhen(get_post_type() === 'post', 'partials.entry-meta')
      </div>
    </div>

    <h3 class="type-sm md:type-md text-balance">{!! $title !!}
    </h3>

    <div class="mt-3 hidden max-w-3xl md:block">
      @php(the_excerpt())

    </div>
  </div>
</a>
