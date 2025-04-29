<div x-data="search" class="flex items-center" @keyup.escape.window="searchOpen = false"
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
        @keyup.debounce.500="if(term.length >= 3) { console.log(term); search() } else {results = null}"
        x-ref="searchInput"
        class="mb-4 block w-full border-b border-b-blue-bright px-8 pb-3 text-2xl -outline-offset-1 focus-visible:border-b-2 focus-visible:outline-none"
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
            <p class="mx-8 text-right">Showing <span
                x-text="resultsPerPage < totalHits ? resultsPerPage : totalHits"></span> result<span
                x-text="totalHits == 1 ? null : 's'"></span>.</p><template x-for="result in results"><a
                :href="result.permalink" class="flex items-center gap-4 border-b border-blue-light px-8 py-4"><img
                  :src="result.images.thumbnail ? result.images.thumbnail.url : 'https://placehold.co/150x150'"
                  class="h-24 w-24 rounded-medium object-cover" />
                <div>
                  <h3 class="type-sm mb-2" x-html="result.post_title"></h3>
                  <p class="inline-block rounded bg-blue-light px-3 py-0.5 text-sm font-semibold text-blue-dark"
                    x-show="result.post_type == 'page'">Page</p>
                  <p class="inline-block rounded bg-green-light px-3 py-0.5 text-sm font-semibold text-green-dark"
                    x-show="result.post_type == 'post'">News</p>
                  <p class="inline-block rounded bg-gold-light px-3 py-0.5 text-sm font-semibold text-gold-dark"
                    x-show="result.post_type == 'tribe_events'">What’s on</p>
                  <p class="inline-block rounded bg-pink-light px-3 py-0.5 text-sm font-semibold text-pink-dark"
                    x-show="result.post_type == 'person'">Person</p>
                </div>
              </a></template>
          </div>
        </div>
      </template>
    </div>
  </div>
</div>
