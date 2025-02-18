@foreach ($pages as $page)
  <a href="{{ $page->permalink }}">{{ $page->post_title }}</a><br>
@endforeach
