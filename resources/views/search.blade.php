@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @else
    <h1 class="type-xl my-16 text-blue-dark">
      {!! __('Search results for', 'sage') !!} <strong>{!! get_search_query() !!}</strong></h1>
  @endif

  <div class="container mx-auto space-y-8 lg:max-w-5xl">
    @while (have_posts())
      @php(the_post())
      @include('partials.content-search')
    @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
