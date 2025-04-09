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

        @if (get_field('salary', $opportunity->ID))
          <div class="flex items-center gap-1">
            <svg class="size-5 text-pink-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.05 6.05">
              <circle cx="3.03" cy="3.03" r="3.03" fill="currentColor" />
              <path fill="#fff"
                d="M1.84 2.75h.28c-.05-.12-.1-.24-.14-.35a.94.94 0 0 1-.07-.37.8.8 0 0 1 .08-.37.86.86 0 0 1 .25-.29 1.25 1.25 0 0 1 .36-.2 1.33 1.33 0 0 1 .44-.03 1.57 1.57 0 0 1 .64.14 1.43 1.43 0 0 1 .52.39l-.48.59-.15-.14-.17-.11-.19-.07h-.17a.36.36 0 0 0-.22.07.26.26 0 0 0-.08.19.67.67 0 0 0 .08.29c.05.1.09.21.14.33h1v.71h-.92a1.45 1.45 0 0 1-.11.26 1.46 1.46 0 0 1-.21.25l.22-.06h.51a1.22 1.22 0 0 0 .32 0h.16l.16-.05.23.7a.91.91 0 0 1-.28.13 1.25 1.25 0 0 1-.32 0h-.24l-.25-.06-.26-.06h-.26a1.48 1.48 0 0 0-.34 0 1.86 1.86 0 0 0-.39.1l-.19-.68a1 1 0 0 0 .27-.26 1 1 0 0 0 .16-.36h-.37Z" />
            </svg>

            <span class="">Salary:</span>
            {{ get_field('salary', $opportunity->ID) }}
          </div>
        @endif

      </div>

    </div>
    <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
      <x-icon.card-arrow class="h-6 w-6 text-pink-dark" />
    </div>
  </a>
