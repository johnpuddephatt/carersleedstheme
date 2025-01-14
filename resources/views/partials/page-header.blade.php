@if (isset($post))
  <div class="overflow-hidden">

    @if (has_post_thumbnail($post->ID))
      <div class="relative -mb-32 ml-auto w-1/2 max-w-4xl">
        <svg class="absolute right-2/3 top-[20%] h-auto w-[60%]" xmlns="http://www.w3.org/2000/svg" width="107.4"
          height="107.43" viewBox="0 0 107.4 107.43">
          <path fill="#ebdbd1"
            d="M13.46 90.73c6.53 8.66 15.94 16 26.77 16.65a40.15 40.15 0 0 0 13.89-2.05c28-8.44 55.62-32.63 53.12-63.8-1.38-17.27-18.78-30.24-33.86-36.62-13-5.5-28-6.57-41.38-2.16C13.35 8.88 3.11 22.18.6 40.89a68.51 68.51 0 0 0 12.86 49.84Z"
            opacity=".3" />
        </svg>
        {!! get_the_post_thumbnail($post->ID, 'landscape', [
            'class' => ' clip-oval translate-x-8 -translate-y-8  block h-auto w-full',
        ]) !!}

      </div>
    @endif
    <div class="container xl:max-w-5xl 2xl:max-w-6xl">
      <div class="relative">

        @if (isset($post) && isset($post->post_type) && $post->post_type == 'post')
          <div class="mb-4 text-xl font-bold md:mb-8 md:text-2xl">
            {{ get_the_date() }}
          </div>
        @else
          @php($ancestors = array_reverse(get_post_ancestors($post->ID)))
          <div class="mb-4">
            @foreach ($ancestors as $ancestor)
              <a href="{{ get_permalink($ancestor) }}">{{ get_the_title($ancestor) }}</a> &gt;
            @endforeach
          </div>
        @endif

        <h2 class="type-xl mb-8 max-w-3xl text-blue">
          {!! $title !!}
        </h2>

        @if (!empty($post->post_excerpt))
          <p class="mb-8 max-w-2xl text-xl leading-tight text-blue lg:text-xl">
            {!! $post->post_excerpt !!}
          </p>
        @endif

      </div>
    </div>
  </div>
@endif
