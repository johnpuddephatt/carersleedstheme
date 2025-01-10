@extends('layouts.app') @section('content')
  {!! $content !!}

  <div class="container pb-24 lg:max-w-5xl lg:space-y-8" id="news">

    @if (!have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>

      {!! get_search_form(false) !!}
    @endif

    <div class="flex flex-col gap-8">
      @while (have_posts())
        @php(the_post())
        <x-post-card :post="get_post()" />
      @endwhile
    </div>

    <div class="mt-12 text-right text-xl">
      {!! paginate_links([
          'prev_text' => '<',
          'next_text' => '>',
          'add_fragment' => '#news',
      ]) !!}
    </div>
  </div>
@endsection
