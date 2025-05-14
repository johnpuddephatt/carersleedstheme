@if ($secondaryNavigation)
  <div class="border-green bg-blue pb-2 pt-3 text-white md:border-b md:bg-white md:text-blue-dark lg:pb-3 lg:pt-6">
    <div class="container flex max-w-none items-center justify-center md:justify-between">
      <div class="type-xs md:type-sm prose">
        {!! strip_tags(get_field('header_text', 'option'), '<a><strong><em><b><i>') !!}
      </div>
      <nav class="hidden lg:block">
        <ul class="flex flex-row items-center gap-4 xl:gap-8">
          @foreach ($secondaryNavigation as $item)
            <li>
              <a class="{{ $item->classes ?? 'text-blue-dark' }} inline-block"
                href="{{ $item->url }}">{!! $item->label !!}</a>
            </li>
          @endforeach
        </ul>
      </nav>

    </div>
  </div>
@endif
<header class="sticky top-0 z-20 border-b border-blue-bright bg-white lg:static">

  <div>
    <div class="container flex max-w-none items-center gap-1">
      <a label="Go to homepage"
        class="font-heading mr-auto flex flex-row items-center gap-1.5 text-2xl font-bold tracking-tight lg:py-6 lg:text-3xl"
        href="{{ home_url('/') }}">
        <x-logo class="!w-40 md:!w-48" />

      </a>

      @if ($primaryNavigation)

        <nav x-cloak :class="{ 'max-lg:translate-x-full': !menuOpen }"
          class="flex flex-col justify-center overflow-y-auto transition max-lg:fixed max-lg:inset-0 max-lg:top-0 max-lg:z-20 max-lg:h-full max-lg:w-full max-lg:bg-blue max-lg:py-36 max-lg:text-white">

          <x-logo class="absolute left-1/2 top-0 -translate-x-1/2 py-3 lg:hidden" :invert="true" />

          <ul class="flex flex-col gap-4 max-lg:container lg:flex-row lg:gap-6 xl:gap-12">
            @foreach ($primaryNavigation as $item)
              <li>
                <a class="max-w-lg:text-white inline-block text-lg font-semibold text-white max-lg:text-2xl lg:py-2 lg:text-blue-dark"
                  href="{{ $item->url }}">{!! $item->label !!}</a>
              </li>
            @endforeach
          </ul>

          @if ($secondaryNavigation)
            <nav class="container mt-6 border-t border-white border-opacity-30 pt-6 lg:hidden">
              <ul class="flex flex-col gap-2 text-lg font-semibold text-white">
                @foreach ($secondaryNavigation as $item)
                  <li>
                    <a class="inline-block" href="{{ $item->url }}">{!! $item->label !!}</a>
                  </li>
                @endforeach
              </ul>
            </nav>
          @endif
        </nav>
      @endif

      @include('partials.search')
      <button aria-label="Talk to us" title="Talk to us"
        @click="window.LC_API.chat_window_maximized() ? window.LC_API.open_chat_window() : window.LC_API.close_chat();"
        class="rounded-full border-2 border-blue-light p-2 text-blue">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-6">
          <path " stroke-linecap="round" stroke-linejoin="round"
            d=" M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98
            2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0
            1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976
            2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0
            11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76
            3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
        </svg>
      </button>

      <button @click="menuOpen = true" :class="{ 'hidden': menuOpen }"
        class="inline-block rounded-small border-2 border-blue-bright px-6 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20 lg:hidden"
        aria-label="Open navigation menu" title="Open navigation menu">Menu
      </button>

      <button @click="menuOpen = false" :class="{ 'hidden': !menuOpen }" class="absolute -top-2 right-4 z-40 lg:hidden"
        aria-label="Close navigation menu" title="Close navigation menu"><svg xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="size-12 rounded-full bg-white bg-opacity-75 p-2 transition hover:bg-opacity-100 hover:text-black">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</header>
