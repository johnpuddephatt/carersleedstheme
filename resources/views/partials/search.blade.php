<div x-cloak x-data="search" class="flex items-center" @keyup.escape.window="searchOpen = false"
  x-effect="searchOpen ? (document.documentElement.style.overflow = 'hidden',setTimeout(()=> $refs.searchInput.focus(), 100)) : document.documentElement.style.overflow = 'auto';">
  <button class="inline-flex items-center gap-1" x-show="searchReady" @click="searchOpen = true">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>

    Search</button>

  <div x-show="searchOpen" x-transition.opacity @click.self="searchOpen = false"
    class="fixed inset-0 z-40 bg-green-light bg-opacity-95">
  </div>
  <div x-show="searchOpen" x-transition.scale.origin.bottom class="fixed inset-0 z-50 flex items-end justify-center">

    <div class="relative flex h-[80vh] w-full max-w-2xl flex-col rounded-t-medium bg-white pt-16 shadow-lg">

      <button aria-label="Close search dialog" @click="searchOpen = false" class="absolute right-4 top-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-8 text-blue">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>

      </button>

      <input placeholder="Start typing to search..."
        @keyup.debounce.500="if(term.length >= 3) { search() } else {results = null}" x-ref="searchInput"
        class="block w-full border-b border-b-blue-bright px-8 pb-3 text-2xl -outline-offset-1 focus-visible:border-b-2 focus-visible:outline-none"
        type="search" x-model="term">

      <style>
        ::-webkit-search-cancel-button {
          -webkit-appearance: none;
          appearance: none;
        }
      </style>

      <div x-show="!term" class="mx-8 mb-8 mt-4 rounded-lg bg-pink-light p-4 py-16 text-center">Start by entering a
        search term above. </div>
      <div x-show="term && term.length < 3" class="mx-8 mb-8 mt-4 rounded-lg bg-pink-light p-4 py-16 text-center">Type
        at least 3 characters to search. </div>
      <div x-show="searching" class="absolute inset-0 flex h-full items-center justify-center bg-white bg-opacity-50">
        <svg class="size-12 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
          </circle>
          <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
          </path>
        </svg>
      </div><template x-if="results">
        <div class="flex-1 overflow-auto">
          <div x-show="noResults">
            <p>Sorry,
              but there were no results. </p>
          </div>
          <div x-show="results">
            {{-- <p class="border-b border-blue-light px-8 py-4 text-right">Showing <span
                x-text="resultsPerPage < totalHits ? resultsPerPage : totalHits"></span> result<span
                x-text="totalHits == 1 ? null : 's'"></span>.</p> --}}

            <template x-for="result in results"><a
                x-show="['post', 'page', 'tribe_events'].includes(result.post_type) && ((result.post_type !== 'tribe_events') || (!result.permalink.includes('__trashed') && new Date(result._EventStartDate) > (new Date()).setHours(0,0,0,0)))"
                :href="result.permalink"
                class="flex items-center gap-4 border-b border-blue-light px-8 py-4 transition hover:bg-blue-light hover:bg-opacity-20">
                <img x-show="result.images.thumbnail"
                  :src="result.images.thumbnail ? result.images.thumbnail.url : null"
                  class="h-24 w-24 rounded-medium object-cover" />
                <svg x-show="!result.images.thumbnail" class="h-24 w-24 rounded-medium bg-blue-light text-blue-bright"
                  xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 36 36">
                  <path fill="currentColor" stroke-width="1.5" d=" M8.4 18C8.3 12.1 13 7.3 18.8 7.2h.5c3.1-.2 6.1 1 8.2 3.2l-2.9 3.4c-1.4-1.4-3.3-2.3-5.3-2.3-3.4
                0-6.1 2.9-6.1 6.3v.2c0 3.6 2.5 6.6 6 6.6 2.1 0 4.1-.9 5.5-2.4l2.9 3c-2.1 2.5-5.3 3.9-8.5 3.7-5.8
                0-10.6-4.6-10.7-10.4v-.4" />
                </svg>

                <div>
                  <template x-if="result.post_type == 'tribe_events'">
                    <div class="type-xs mb-2 text-blue"
                      x-html="new Date(result._EventStartDate).toLocaleDateString('en-GB', {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit',
                      })">
                    </div>

                  </template>
                  <div x-show="result.post_type == 'post'" class="type-xs mb-2 text-blue"
                    x-html="result.post_date_formatted"></div>
                  <h3 class="type-sm mb-2" x-html="result.post_title"></h3>

                  <p class="inline-flex items-center gap-0.5 rounded bg-blue-light py-0.5 pl-2 pr-3 text-sm font-semibold text-blue-dark"
                    x-show="result.post_type == 'page'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="size-3.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    Page
                  </p>
                  <p class="inline-flex items-center gap-0.5 rounded bg-green-light py-0.5 pl-2 pr-3 text-sm font-semibold text-green-dark"
                    x-show="result.post_type == 'post'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="size-3.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                    </svg>

                    News
                  </p>
                  <p class="inline-flex items-center gap-0.5 rounded bg-gold-light py-0.5 pl-2 pr-3 text-sm font-semibold text-gold-dark"
                    x-show="result.post_type == 'tribe_events'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="size-3.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    What’s on
                  </p>

                </div>
              </a>
            </template>
          </div>
        </div>
      </template>
    </div>
  </div>
</div>
