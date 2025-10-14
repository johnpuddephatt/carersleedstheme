@extends('layouts.app') @section('content')
  <div class="relative pb-72">
    {{ implode(',', wp_list_pluck(get_the_terms(null, 'post_tag'), 'name')) }}
    <div class="container flex flex-col-reverse overflow-hidden pb-4 md:gap-4 md:pb-8 lg:flex-row lg:items-end lg:pb-12">
      <div class="relative z-10 lg:w-1/2 lg:pt-24">
        <a class="type-md mb-4 inline-block text-blue" href="{{ get_permalink(get_option('page_for_events')) }}">Events
          &rsaquo;
        </a>
        <h1 class="type-2xl mb-2 text-blue-dark md:mb-4">{{ $event->post_title }}</h1>
        <div class="flex items-center">
          <span class="mr-1 inline-block rounded-full bg-blue-bright p-0.5 md:mr-2">
            <x-icon-calendar class="h-6 w-6 text-white" />
          </span>
          <p class="type-md text-blue-dark">

            {!! tribe_get_start_date($event->ID, false, get_option('date_format')) !!}

            @if (!tribe_event_is_all_day($event->ID))
              &nbsp; &mdash; &nbsp;
              {!! tribe_get_start_date($event->ID, false, get_option('time_format')) !!}

              @if (tribe_get_end_date($event->ID, false, get_option('time_format')) !==
                      tribe_get_start_date($event->ID, false, get_option('time_format')))
                -
                {{ tribe_get_end_date($event->ID, false, get_option('time_format')) }}
              @endif
            @endif
          </p>
        </div>

      </div>
      @if (has_post_thumbnail($event->ID))
        <div
          class="relative ml-auto w-full max-w-sm -translate-y-8 translate-x-12 pt-4 md:translate-x-0 md:translate-y-0 lg:w-1/2 lg:max-w-4xl">
          <svg xmlns="http://www.w3.org/2000/svg" width="196.05" height="142.92"
            class="absolute right-2/3 top-0 h-auto w-full" viewBox="0 0 196.05 142.92">
            <path fill="#ebdbd1"
              d="M188.48.08c8.87 12 9.81 27.87 3.49 41.48-8.49 18.32-29.4 28.85-36.92 47.62-4.67 11.65-3.57 25.21-9.36 36.36a33.15 33.15 0 0 1-33.07 17.09 31.89 31.89 0 0 1-15.11-6.5 90.73 90.73 0 0 0-32.4-16c-17.77-4.7-40.55-9.91-58-38.81C-.2 69.24-7.73 34.18 17.27 23.26a46 46 0 0 1 31.57-1.9c10.49 3.07 21.14 7.5 32 6C96.63 25.12 106.93 11.57 118.6.01"
              opacity=".3" />
          </svg>

          {!! get_the_post_thumbnail($event->ID, 'large', [
              'class' => ' clip-oval  block h-auto w-full',
              'sizes' => '100vw, (min-width: 800px) 40vw',
          ]) !!}

        </div>
      @endif
    </div>

    <div class="container flex flex-col gap-8 lg:flex-row-reverse lg:justify-end lg:gap-16">
      @if (tribe_get_venue($event->ID) || tribe_get_address($event->ID) || tribe_get_embedded_map($event->ID))
        <div class="border-t border-green pt-4 md:pt-8 lg:w-1/2">
          <h3 class="type-md mb-4 text-blue-dark">Location</h3>
          @if (tribe_get_venue($event->ID))
            <p class="type-sm text-blue-dark">{{ tribe_get_venue($event->ID) }}</p>
          @endif
          @if (tribe_get_address($event->ID))
            <p class="type-sm text-blue-dark">{{ tribe_get_address($event->ID) }}</p>
          @endif
          @if (tribe_get_address($event->ID))
            <p class="type-sm text-blue-dark">{{ tribe_get_zip($event->ID) }}</p>
          @endif

          @if (tribe_get_embedded_map($event->ID))
            <div class="mt-8 overflow-hidden rounded-medium">
              {!! tribe_get_embedded_map($event->ID) !!}
            </div>
          @endif

        </div>
      @endif
      <div class="post-content prose max-w-none xl:prose-lg lg:w-1/2">

        {{ the_content($event->ID) }}

      </div>

    </div>
    @if (is_active_sidebar('sidebar-events'))
      <?php dynamic_sidebar('sidebar-events'); ?>
    @endif

    <svg xmlns="http://www.w3.org/2000/svg" width="150.75" height="110.76" viewBox="0 0 150.75 110.76"
      class="absolute bottom-0 right-0 h-auto w-[75vw] md:w-[50vw] lg:w-[35vw]">
      <defs>
        <clipPath id="ad683" transform="translate(-257.34 -389.24)">
          <path fill="none" d="M250.2 336.03h170.29V614H250.2z" />
        </clipPath>
      </defs>
      <g clip-path="url(#ad683)" opacity=".6">
        <path fill="#ffd19e"
          d="M15.66 83.94a54.59 54.59 0 0 1 36.71-7.59c12.83 1.83 26.07 5.22 38.51 1.58 26.21-7.67 35-41.07 57.34-56.74 16.65-11.66 40.68-11.5 57.17.39s24.27 34.66 18.43 54.18c-6.86 23-29.6 38.84-35.23 62.14-3.51 14.47.09 30.18-4.81 44.24-5.12 14.76-20.21 25.53-35.89 25.62a37.91 37.91 0 0 1-18.84-5 107.34 107.34 0 0 0-40.72-13.25c-21.67-2.55-49.25-4.75-74.67-35.75-10.65-12.9-25.44-52.76 2-69.82Z" />
      </g>
      <circle cx="132.52" cy="9.66" r="9.66" fill="#65bec5" />
    </svg>
  </div>
@endsection
