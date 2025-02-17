@extends('layouts.app') @section('content')
  @while (have_posts())
    @php(the_post())
    <div class="flex min-h-screen w-full flex-row">
      @include('partials.page-sidebar')

      <div class="flex-1">

        @include('partials.page-header')

        @includeFirst(['partials.content-page-' . get_post_type(), 'partials.content-page'])

        @if (get_field('show_cta'))
          @include('blocks.blocks', [
              'block' => (object) [
                  'classes' => 'bg-blue-light alignfull !my-0',
                  'block' => (object) ['align' => 'alignfull'],
                  'preview' => false,
                  'inlineStyle' => '',
              ],
              'title' => get_field('contact_title', 'option'),
              'subtitle' => get_field('contact_subtitle', 'option'),
              'blocks' => get_field('contact_blocks', 'option'),
              'more_link' => get_field('contact_link', 'option'),
          ])
        @endif
        @include('partials.page-siblings')
      </div>
    </div>
  @endwhile
@endsection
