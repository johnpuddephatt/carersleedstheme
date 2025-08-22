{{--
  Template Name: Job Application Template
--}}
@section('title', 'foo')
@extends('layouts.app') @section('content')

  @if (!isset($_GET['job_id']) || get_post_type($_GET['job_id']) !== 'volunteering')
    <div class="container mb-24 space-y-8 lg:max-w-5xl">

      <x-alert type="warning">
        <p>Sorry, the volunteering opportunity you are looking for does not exist.</p>
        Back to <a
          href="{{ get_permalink(get_option('page_for_volunteering')) }}">{{ get_the_title(get_option('page_for_volunteering')) }}</a>.
      </x-alert>

    </div>
  @else
    <div class="alignwide pt-36">
      <div style="padding: 0 4.5%">

        <a class="type-md mb-4 inline-block text-blue"
          href="{{ get_permalink(get_option('page_for_volunteering')) }}">Volunteering
          &rsaquo;</a>

        <h1 class="alignwide type-xl mb-4 text-blue-dark">Applying for {{ get_the_title($_GET['job_id']) }}</h1>
        <div class="prose xl:prose-lg">
          {!! $content !!}
        </div>
      </div>
    </div>
  @endif
@endsection
