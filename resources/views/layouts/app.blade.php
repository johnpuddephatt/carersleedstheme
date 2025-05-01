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

  <script>
    window.algoliaAppId = '{{ get_field('algolia_app_id', 'options') }}';
    window.algoliaApiKey = '{{ get_field('algolia_api_key', 'options') }}';
  </script>

  <meta property="og:description" content="{!! $og['description'] !!}" />
  <meta property="og:image" content="{!! $og['image'] !!}" />

  @if ($analytics ?? false)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $analytics }}"></script>

    <script>
      if (localStorage.getItem('cookiesAccepted') === 'true') {
        window.dataLayer = window.dataLayer || [];

        console.log('Google Analytics loaded:', '{{ $analytics }}');

        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ $analytics }}');
      }
    </script>
  @endif

</head>

<body @php(body_class())>
  @include('svg')

  @php(wp_body_open())

  <div id="app">
    <a class="sr-only focus:not-sr-only" href="#main">
      {{ __('Skip to content') }}
    </a>

    @include('sections.header')

    <main id="main" class="main min-h-[60vh]">
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif
    @include('sections.footer')
    @include('partials.cookies')
  </div>

  @php(do_action('get_footer'))
  @php(wp_footer())

</body>

</html>
