<!doctype html>
<html @php(language_attributes()) x-data="{ menuOpen: false }" :class="{ 'overflow-hidden': menuOpen }">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())

  @if ($_GET['job_id'] ?? false)
    <script>
      window.jobApplicationID = {{ $_GET['job_id'] }};
    </script>
  @endif

</head>

<body @php(body_class())>
  @php(wp_body_open())

  <div id="app">
    <a class="sr-only focus:not-sr-only" href="#main">
      {{ __('Skip to content') }}
    </a>

    @include('sections.header')

    <main id="main" class="main min-h-screen">
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif
    @include('sections.footer')
  </div>

  @php(do_action('get_footer'))
  @php(wp_footer())

  @include('svg')
</body>

</html>
