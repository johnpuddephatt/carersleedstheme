<header class="sticky top-0 z-10 bg-white bg-opacity-95 lg:static">
  @if ($secondaryNavigation)
    <div class="hidden border-b border-green pb-3 pt-6 lg:block">
      <div class="container flex max-w-none justify-between">
        <div class="font-semibold text-blue">
          Need to talk to someone? Call us on 0113 380 4300
        </div>
        <nav>
          <ul class="flex flex-row items-center gap-8">
            @foreach ($secondaryNavigation as $item)
              <li>
                <a class="text-blue-dark inline-block" href="{{ $item->url }}">{!! $item->label !!}</a>
              </li>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
  @endif
  <div>
    <div class="container flex max-w-none items-center justify-center lg:justify-between">
      <a label="Go to homepage"
        class="font-heading flex flex-row items-center gap-1.5 py-3 text-2xl font-bold tracking-tight lg:py-6 lg:text-3xl"
        href="{{ home_url('/') }}">
        <x-logo />

      </a>
      <button @click="menuOpen = true" :class="{ 'hidden': menuOpen }" class="lg:hidden"
        aria-label="Open navigation menu" title="Open navigation menu"><svg xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="absolute right-4 top-2 h-12 w-12 rounded-full bg-white bg-opacity-10 p-2 transition-all duration-500 hover:bg-opacity-100 hover:text-black">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>

      <button @click="menuOpen = false" :class="{ 'hidden': !menuOpen }" class="lg:hidden"
        aria-label="Close navigation menu" title="Close navigation menu"><svg xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="absolute right-4 top-2 z-40 h-12 w-12 rounded-full bg-white bg-opacity-75 p-2 transition hover:bg-opacity-100 hover:text-black">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      @if ($primaryNavigation)

        <nav x-cloak :class="{ 'max-lg:translate-x-full': !menuOpen }"
          class="flex flex-col justify-center overflow-y-auto transition max-lg:fixed max-lg:inset-0 max-lg:top-0 max-lg:z-20 max-lg:h-full max-lg:w-full max-lg:bg-blue max-lg:py-36 max-lg:text-white">

          <x-logo class="absolute left-1/2 top-0 -translate-x-1/2 py-3 lg:hidden" :invert="true" />

          <ul class="flex flex-col gap-4 max-lg:container lg:flex-row lg:gap-12">
            @foreach ($primaryNavigation as $item)
              <li>
                <a class="max-w-lg:text-white inline-block text-lg font-semibold text-blue max-lg:text-2xl lg:py-2"
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
    </div>
  </div>
</header>
