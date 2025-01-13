{{--
  Template Name: Fullwidth Template
--}}

@extends('layouts.app')

@section('content')
  <div class="page-content prose relative pb-36">
    @while (have_posts())
      @php(the_post())
      @php(the_content())
    @endwhile
    <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-0 -z-10 h-auto w-[50vw] lg:w-[35vw]"
      viewBox="0 0 167.3 67.8">
      <path fill="#65bec5"
        d="M167.3 67.8V12.1a39.635 39.635 0 0 0-6.54-5.43c-14.46-9.52-34.91-8.79-48.65 1.74-18.46 14.15-24.7 42.88-46.72 50.35-10.46 3.55-21.84 1.14-32.82.05-10.98-1.09-21.83 1.57-30.96 7.79-.56.38-1.09.79-1.61 1.19h167.3Z"
        opacity=".3" />
    </svg>

  </div>
@endsection
