<form role="search" method="get" class="search-form mx-auto mt-8 flex flex-row justify-center"
  action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>

    <input type="search" placeholder="{!! esc_attr_x('Search&hellip;', 'placeholder', 'sage') !!}" value="{{ get_search_query() }}" name="s"
      class="inline-block rounded-small border-2 border-blue-light py-2 pl-6 pr-8 font-semibold !no-underline transition duration-300 focus:ring-blue-bright">
  </label>

  <button
    class="-ml-8 inline-block rounded-small border-2 border-blue-bright bg-white px-10 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20">{{ _x('Search', 'submit button', 'sage') }}</button>
</form>
