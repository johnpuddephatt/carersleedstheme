@extends('layouts.app') @section('content')
  @if (is_category())
    <div class="container py-24 lg:max-w-5xl">
      <a href="{{ get_permalink(get_option('page_for_posts')) }}">&larr; Back to all news</a>
      <h1 class="type-xl mt-8 text-blue-dark">
        {!! get_queried_object()->name !!}
      </h1>
    </div>
  @else
    {!! $content !!}

    <div class="container mb-24 grid gap-4 md:grid-cols-3 md:gap-8 lg:max-w-5xl">
      <x-page-card-compact :url="get_term_link(1, 'category')" title="General news" />
      <x-page-card-compact :url="get_term_link(19, 'category')" title="Reports & briefings" />
      <x-page-card-compact :url="get_term_link(20, 'category')" title="Carer stories" />
    </div>
  @endif

  <div class="container space-y-4 pb-24 lg:max-w-5xl lg:space-y-8" id="news">

    @if (!have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>
    @endif

    @while (have_posts())
      @php(the_post())
      <x-post-card :post="get_post()" />
    @endwhile

    <div class="mt-12 text-right text-xl">
      {!! paginate_links([
          'prev_text' => '<',
          'next_text' => '>',
          'add_fragment' => '#news',
      ]) !!}
    </div>
  </div>
@endsection
