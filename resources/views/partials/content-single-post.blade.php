<div class="relative overflow-hidden">

  <div class="container flex flex-col-reverse gap-4 lg:flex-row lg:items-end">
    <div class="relative z-10 pb-16 lg:w-1/2 lg:pb-24">
      <a class="type-md mb-4 inline-block text-blue" href="{{ get_permalink(get_option('page_for_posts')) }}">News
        &rsaquo;
      </a>
      <h1 class="type-2xl text-blue-dark">{!! get_the_title() !!}</h1>

    </div>
    @if (has_post_thumbnail())
      <div class="relative -mb-8 ml-auto w-3/4 max-w-sm translate-x-12 md:translate-x-0 md:pt-12 lg:w-1/2 lg:max-w-xl">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 107.81 107.17" class="absolute left-1/2 top-1/2 h-auto w-2/3">
          <path fill="#ffd09d"
            d="M15.18 15.74C6.89 22.73.07 32.52 0 43.36c-.03 4.7 1.21 9.33 2.81 13.75 9.94 27.54 35.58 53.79 66.56 49.62 17.17-2.31 29.19-20.38 34.75-35.78 4.8-13.27 5.05-28.28-.07-41.43C96.93 11.23 83.1 1.71 64.28.21c-17.53-1.4-35.62 4.17-49.1 15.53Z"
            opacity=".5" />
        </svg>

        {!! get_the_post_thumbnail(null, 'square', [
            'class' => ' clip-oval-2  block h-auto w-full',
            'sizes' => '66vw, (min-width: 800px) 33vw',
        ]) !!}

      </div>
    @endif
  </div>

  <div class="container flex flex-col gap-8 lg:flex-row lg:gap-16">

    <div class="post-content prose max-w-none pb-16 xl:prose-lg lg:w-1/2">

      {{ the_content() }}

    </div>

  </div>
  @if (is_active_sidebar('sidebar-news'))
    <?php dynamic_sidebar('sidebar-news'); ?>
  @endif
  <svg xmlns="http://www.w3.org/2000/svg" width="56.01" height="105.71"
    class="pointer-events-none absolute bottom-12 right-0 h-auto w-[40vw] max-w-96 translate-y-1/4 lg:w-[20vw]"
    viewBox="0 0 56.01 105.71">
    <path fill="#ffd09d"
      d="M56.01,5.41c-2.54-.87-5.02-1.9-7.42-3.13C45.43.68,41.88-.16,38.34.03c-8.42.44-16.26,6.59-18.67,14.68-2.29,7.68.03,16.04-1.5,23.91C15.7,51.27,3.86,60.37.74,72.88c-2.66,10.61,2.06,22.66,11.21,28.65,9.15,5.99,22.08,5.49,30.75-1.19,5.56-4.29,9.35-10.67,13.32-16.69V5.41Z" />
  </svg>
</div>
