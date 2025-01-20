@extends('layouts.app') @section('content')
  @while (have_posts())
    @php(the_post())
    <div class="flex min-h-screen w-full flex-row">
      @include('partials.page-sidebar')

      <div class="flex-1">

        @include('partials.page-header')

        @includeFirst(['partials.content-page-' . get_post_type(), 'partials.content-page'])

        @include('partials.page-siblings')
      </div>
    </div>
  @endwhile
@endsection
