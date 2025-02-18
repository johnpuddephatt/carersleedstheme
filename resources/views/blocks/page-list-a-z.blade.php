@foreach ($pages as $page)
  <a href="{{ $page['link'] }}">{!! $page['title'] !!}</a><br>
@endforeach
