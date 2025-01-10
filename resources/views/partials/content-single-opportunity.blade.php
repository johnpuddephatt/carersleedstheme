  <div class="relative w-full overflow-hidden border-t border-green pb-72 pt-32">

    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-1/2 top-12 w-1/4 min-w-96" viewBox="0 0 107.4 107.43">
      <path fill="#eadad0"
        d="M13.46 90.74c6.53 8.66 15.94 16 26.77 16.64 4.7.28 9.38-.71 13.88-2.07 28.03-8.44 55.62-32.64 53.12-63.8-1.38-17.27-18.78-30.24-33.86-36.62-12.99-5.5-27.96-6.56-41.36-2.16C13.35 8.86 3.11 22.17.6 40.88c-2.34 17.43 2.25 35.79 12.86 49.86Z"
        opacity=".3" />
    </svg>

    <div class="container flex flex-col-reverse gap-4 pb-8 lg:flex-row lg:items-end lg:pb-12">
      <div class="relative z-10 lg:w-1/2">
        <div class="type-md mb-4 text-blue-dark">Opportunities</div>
        <h1 class="type-xl mb-8 text-blue-dark">{{ $post->post_title }}</h1>

        <div class="flex gap-4">
          @if (get_field('deadline', $post->ID))
            <div class="flex items-center">
              <span class="mr-2 inline-block rounded-full bg-beige-dark p-1.5">
                <x-icon-calendar class="h-4 w-4 text-white" />
              </span>
              <div class="type-sm">
                Closing date: {{ date(get_option('date_format'), strtotime(get_field('deadline', $post->ID))) }}
              </div>
            </div>
          @endif

          @if (get_field('salary', $post->ID))
            <div class="flex items-center">
              <span class="mr-2 inline-block rounded-full bg-beige-dark p-0.5">
                <x-icon-pound class="h-6 w-6 text-white" />
              </span>
              <div class="type-sm">
                Pay: {{ get_field('salary', $post->ID) }}
              </div>
            </div>
          @endif
        </div>
      </div>
      @if (has_post_thumbnail($post->ID))
        <div class="relative ml-auto max-w-sm pt-4 lg:w-1/2 lg:max-w-4xl">
          <svg xmlns="http://www.w3.org/2000/svg" width="196.05" height="142.92"
            class="absolute right-2/3 top-0 h-auto w-full" viewBox="0 0 196.05 142.92">
            <path fill="#ebdbd1"
              d="M188.48.08c8.87 12 9.81 27.87 3.49 41.48-8.49 18.32-29.4 28.85-36.92 47.62-4.67 11.65-3.57 25.21-9.36 36.36a33.15 33.15 0 0 1-33.07 17.09 31.89 31.89 0 0 1-15.11-6.5 90.73 90.73 0 0 0-32.4-16c-17.77-4.7-40.55-9.91-58-38.81C-.2 69.24-7.73 34.18 17.27 23.26a46 46 0 0 1 31.57-1.9c10.49 3.07 21.14 7.5 32 6C96.63 25.12 106.93 11.57 118.6.01"
              opacity=".3" />
          </svg>

          {!! get_the_post_thumbnail($post->ID, 'large', [
              'class' => ' clip-oval  block h-auto w-full',
          ]) !!}

        </div>
      @endif
    </div>

    <div class="container relative flex flex-col items-start justify-between gap-8 lg:flex-row-reverse lg:gap-16">

      <div class="w-full rounded-3xl bg-blue-light p-8 lg:w-1/2 lg:max-w-md">

        <h3 class="type-md text-blue-dark">Key information</h3>

        <ul class="mt-4 list-inside list-disc">
          @if (get_field('location', $post->ID))
            <li>Location: {{ get_field('location', $post->ID) }}</li>
          @endif
          @if (get_field('salary', $post->ID))
            <li>
              Pay: {{ get_field('salary', $post->ID) }}</li>
          @endif
          @if (get_field('deadline', $post->ID))
            <li>Closing date: {{ get_field('deadline', $post->ID) }}</li>
          @endif
          @if (get_field('hours', $post->ID))
            <li>Hours: {{ get_field('hours', $post->ID) }}</li>
          @endif
          @if (get_field('contract_type', $post->ID))
            <li>Contract: {{ get_field('contract_type', $post->ID) }}</li>
          @endif
        </ul>
        <div class="mt-8 text-center">
          <x-button class="bg-white !px-16" label="Apply here" :url="get_permalink(get_option('page_for_applications')) . '?job_id=' . $post->ID" />
        </div>
      </div>

      <div class="prose max-w-none lg:w-1/2">
        {{ the_content($post->ID) }}
      </div>

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="150.75" height="110.76" viewBox="0 0 150.75 110.76"
      class="absolute bottom-0 right-0 -z-10 h-auto w-[50vw] lg:w-[35vw]">
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
