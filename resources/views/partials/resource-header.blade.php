<div class="border-t border-blue border-opacity-30 pt-32 2xl:pt-36">

  <div class="container">
    <a class="mb-12 inline-block lg:text-lg"
      href="{{ get_permalink(get_option('page_for_resources')) }}">{!! get_the_title(get_option('page_for_resources')) !!}
      &gt;</a>
    <h1 class="max-w-4xl  text-6xl">{!! $title !!} </h1>
    <p class="mb-16 mt-6 text-2xl">{{ get_the_date('F Y') }}</p>

    @if ($types)
      <div class="flex flex-row gap-2">
        @foreach ($types as $type)
          <a class="rounded-full bg-pink px-6 py-2"
            href="{{ get_permalink(get_option('page_for_resources')) }}?type={{ $type->term_id }}">
            {!! $type->name !!}
          </a>
        @endforeach
    @endif

    @if ($issues)
      @foreach ($issues as $issue)
        <a class="rounded-full bg-gold px-6 py-2" href="{{ get_permalink($issue->ID) }}">
          {!! $issue->post_title !!}
        </a>
      @endforeach
    @endif
  </div>
</div>
