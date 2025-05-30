  <a href="{{ get_permalink($opportunity->ID) }}"
    class="group relative flex w-full items-center overflow-hidden rounded-small bg-pink-light p-4 !no-underline md:p-8">

    <div class="flex-1">

      <h3 class="type-md !mb-2 !mt-0 !text-black">{{ $opportunity->post_title }}
      </h3>

      <div class="flex flex-col !font-normal md:flex-row md:items-center md:gap-3">
        @if (get_field('deadline', $opportunity->ID))
          <div class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-pink-dark" viewBox="0 0 6.05 6.05">

              <circle cx="3.03" cy="3.03" r="3.03" fill="currentColor" />
              <path fill="#fff" fill-rule="evenodd"
                d="M3.84 1.66h-.61v-.12a.13.13 0 0 0-.13-.13.13.13 0 0 0-.12.13v.12h-.61v-.12a.13.13 0 0 0-.12-.13.13.13 0 0 0-.13.13v.12h-.38a.36.36 0 0 0-.25.11.39.39 0 0 0-.1.25v2.21a.39.39 0 0 0 .1.25.36.36 0 0 0 .25.11h2.73a.36.36 0 0 0 .25-.11.38.38 0 0 0 .09-.25V2.02a.38.38 0 0 0-.09-.25.36.36 0 0 0-.25-.11h-.39v-.12a.12.12 0 1 0-.24 0ZM2.12 3.98h.25a.12.12 0 1 0 0-.24h-.25a.12.12 0 0 0 0 .24Zm.86 0h.25a.12.12 0 1 0 0-.24H3a.12.12 0 0 0 0 .24Zm.86 0h.24a.12.12 0 0 0 0-.24h-.24a.12.12 0 1 0 0 .24Zm-1.72-.73h.25a.12.12 0 0 0 .12-.12.12.12 0 0 0-.12-.13h-.25a.13.13 0 0 0-.12.14.13.13 0 0 0 .12.11Zm.86 0h.25a.13.13 0 0 0 .12-.12.13.13 0 0 0-.12-.13H3a.12.12 0 0 0-.12.13.12.12 0 0 0 .12.12Zm.86 0h.24a.12.12 0 0 0 .12-.12.12.12 0 0 0-.12-.13h-.24a.13.13 0 0 0-.13.13.13.13 0 0 0 .13.12Zm.24-1.35v.12a.12.12 0 1 1-.24 0V1.9h-.61v.12a.13.13 0 0 1-.13.13.13.13 0 0 1-.12-.13V1.9h-.61v.12a.13.13 0 0 1-.12.13.13.13 0 0 1-.13-.13V1.9h-.38a.08.08 0 0 0-.07 0 .11.11 0 0 0 0 .08v.37H4.6v-.37a.11.11 0 0 0 0-.08.09.09 0 0 0-.07 0Z" />
              <rect width=".59" height=".4" x="1.95" y="2.99" fill="currentColor" rx=".08" />
              <rect width=".59" height=".4" x="2.81" y="2.99" fill="currentColor" rx=".08" />
              <rect width=".59" height=".4" x="3.66" y="2.99" fill="currentColor" rx=".08" />
              <rect width=".59" height=".4" x="1.95" y="3.67" fill="currentColor" rx=".08" />
              <rect width=".59" height=".4" x="2.81" y="3.67" fill="currentColor" rx=".08" />
              <rect width=".59" height=".4" x="3.66" y="3.67" fill="currentColor" rx=".08" />
            </svg>

            <span class="">Closing date:</span>

            {{ date(get_option('date_format'), strtotime(get_field('deadline', $opportunity->ID))) }}

          </div>
        @endif

      </div>

    </div>
    <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
      <x-icon.card-arrow class="h-6 w-6 text-pink-dark" />
    </div>
  </a>
