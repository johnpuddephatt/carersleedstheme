<div class="{{ $background_colour ?? 'bg-pink' }} relative mb-12 lg:mb-24">
  <div class="pointer-events-none absolute inset-0 left-0 top-0 h-full w-full overflow-hidden">
    <svg class="absolute -right-16 top-1/2 h-auto w-3/5 -translate-y-1/2 lg:-right-16" xmlns="http://www.w3.org/2000/svg"
      width="988.81" height="992.23" viewBox="0 0 988.81 992.23">
      <path fill="#fff"
        d="M197.36 894.69a60.49 60.49 0 0 1-36.48-47.92l-30.92-239.31a60.48 60.48 0 0 1 23.24-55.72l191.76-146.48a60.55 60.55 0 0 1 59.83-7.76l193.48 80.65 143.36-109.5-23-177.81-165.5-69L91.67 474.29a57 57 0 0 1-79.95-10.71 57 57 0 0 1 10.7-79.95L508.49 12.37a60.45 60.45 0 0 1 59.9-7.72L791.1 97.47l.15.07a60.53 60.53 0 0 1 36.48 47.85l31 239.39a60.54 60.54 0 0 1-23.24 55.72L642.83 587.64a60.84 60.84 0 0 1-23.75 11 60 60 0 0 1-36.1-3.24l-193.46-80.65-142.49 108.83 23 177.81 165.49 69 461.63-352.6a57.041 57.041 0 0 1 69.25 90.66L480.13 979.86a60.55 60.55 0 0 1-59.83 7.76l-222.78-92.86Z"
        opacity=".2" />
    </svg>
  </div>

  <div
    class="{{ isset($background_colour) ? str_replace('bg-', 'from-', $background_colour) : 'from-pink' }} pointer-events-none absolute left-[45%] h-full w-[60%] bg-gradient-to-r from-15% to-transparent lg:left-auto lg:right-0">
  </div>

  <div class="container flex-none">
    <div class="relative flex flex-col justify-between md:flex-row lg:items-center xl:min-h-[16rem]">

      <div class="pb-6 pt-16 md:pb-16 xl:py-36">
        @if ($posts_page_id = get_option('page_for_' . get_post_type(get_the_ID()) . 's'))
          <div>
            <a class="mb-6 inline-block lg:text-lg" href="{{ get_permalink($posts_page_id) }}">{!! get_the_title($posts_page_id) !!}
              &gt;</a>
          </div>
        @endif

        @if ($post->post_type == 'post')
          <time class="mb-4 inline-block text-lg lg:text-2xl" datetime="{{ get_post_time('c', true) }}">
            {{ get_the_date() }}
          </time>
        @endif
        <h1 class="mb-2 max-w-4xl  text-4xl lg:mb-8 lg:text-6xl">{!! $title ?? get_the_title() !!}</h1>

        @if (isset($subtitle))
          <p class="relative max-w-2xl text-lg !leading-tight lg:text-xl 2xl:text-2xl">{!! $subtitle !!}</h2>
          @elseif ($post->post_excerpt)
          <p class="relative max-w-2xl text-lg !leading-tight lg:text-xl 2xl:text-2xl">{!! $post->post_excerpt !!}</p>
        @endif

      </div>

      {!! get_the_post_thumbnail($page_id ?? null, 'square', [
          'class' =>
              'ml-auto right-0 top-full xl:-translate-y-1/3 -mb-8 mt-auto xl:absolute clip-hex max-w-none flex-none block w-32 md:w-48 lg:w-64 xl:w-96  h-auto  object-cover',
      ]) !!}
    </div>

  </div>

</div>
