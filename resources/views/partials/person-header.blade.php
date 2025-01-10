<div class="relative mb-12 bg-pink lg:mb-24">
  <div class="pointer-events-none absolute inset-0 left-0 top-0 h-full w-full overflow-hidden">
    <svg class="absolute -right-16 top-1/2 h-auto w-3/5 -translate-y-1/2 lg:-left-16 lg:right-auto"
      xmlns="http://www.w3.org/2000/svg" width="988.81" height="992.23" viewBox="0 0 988.81 992.23">
      <path fill="#fff"
        d="M197.36 894.69a60.49 60.49 0 0 1-36.48-47.92l-30.92-239.31a60.48 60.48 0 0 1 23.24-55.72l191.76-146.48a60.55 60.55 0 0 1 59.83-7.76l193.48 80.65 143.36-109.5-23-177.81-165.5-69L91.67 474.29a57 57 0 0 1-79.95-10.71 57 57 0 0 1 10.7-79.95L508.49 12.37a60.45 60.45 0 0 1 59.9-7.72L791.1 97.47l.15.07a60.53 60.53 0 0 1 36.48 47.85l31 239.39a60.54 60.54 0 0 1-23.24 55.72L642.83 587.64a60.84 60.84 0 0 1-23.75 11 60 60 0 0 1-36.1-3.24l-193.46-80.65-142.49 108.83 23 177.81 165.49 69 461.63-352.6a57.041 57.041 0 0 1 69.25 90.66L480.13 979.86a60.55 60.55 0 0 1-59.83 7.76l-222.78-92.86Z"
        opacity=".2" />
    </svg>
  </div>

  <div
    class="{{ isset($background_colour) ? str_replace('bg-', 'from-', $background_colour) : 'from-pink' }} pointer-events-none absolute left-[45%] h-full w-[60%] bg-gradient-to-r from-15% to-transparent lg:left-0 lg:w-1/2">
  </div>

  <div class="container flex-none">
    <div class="relative flex flex-row items-center justify-between xl:min-h-[16rem]">

      <div class="pb-6 pt-16 xl:py-36">
        @if (get_option('page_for_people') && get_permalink(get_option('page_for_people')))

          @if ($parent_id = wp_get_post_parent_id(get_option('page_for_people')))
            <a class="mb-6 inline-block lg:text-lg" href="{{ get_permalink($parent_id) }}">{!! get_the_title($parent_id) !!}
              &gt;</a>
          @endif

          <a class="mb-6 inline-block lg:text-lg"
            href="{{ get_permalink(get_option('page_for_people')) }}">{!! get_the_title(get_option('page_for_people')) !!}
            &gt;</a>
        @endif
        <h1 class="mb-8 max-w-sm  text-4xl md:text-5xl lg:text-6xl">{!! $title ?? get_the_title() !!}</h1>

        <div class="flex-row gap-3 text-lg !leading-none lg:text-2xl xl:flex">
          <div>{{ carbon_get_post_meta(get_the_ID(), 'role_title') }}</div>
          <div class="border-black border-opacity-10 pt-3 xl:border-l-2 xl:pl-3 xl:pt-0">
            @if ($role_types = get_the_terms(get_the_ID(), 'role_type'))
              {{ implode(', ',array_map(function ($role_type) {return $role_type->name;}, $role_types)) }}
            @endif
          </div>
        </div>
      </div>

      {!! get_the_post_thumbnail($page_id ?? null, 'square', [
          'class' =>
              'right-0 top-full xl:-translate-y-1/3 -mb-8 mt-auto xl:absolute clip-hex max-w-none flex-none block w-32 md:w-36 lg:w-64 xl:w-96  h-auto  object-cover',
      ]) !!}
    </div>

  </div>

</div>
