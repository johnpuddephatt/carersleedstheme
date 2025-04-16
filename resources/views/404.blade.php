@extends('layouts.app')

@section('content')
  @php
    $page_id = get_option('page_for_404');
    $page = get_post($page_id);
  @endphp
  @if ($page)
    {!! apply_filters('the_content', $page->post_content) !!}
  @else
    <div class="container">
      <h1 class="type-2xl mb-4 text-blue-dark">404 - Page Not Found</h1>
      <p class="type-md text-blue-dark">Sorry, the page you are looking for does not exist.</p>
      <p class="type-md text-blue-dark">You can go back to the <a href="{{ home_url('/') }}" class="text-blue">homepage</a>
        or check our <a href="{{ get_permalink(get_option('page_for_events')) }}" class="text-blue">events page</a>.</p>
    </div>
  @endif
@endsection
