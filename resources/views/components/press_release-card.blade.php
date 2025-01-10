<a href="{{ get_permalink($release->ID) }}"
  class="not-prose group relative block overflow-hidden rounded bg-pink bg-opacity-30 !no-underline transition hover:bg-opacity-50 xl:text-base">
  <div class="flex flex-row items-center border-l-8 border-pink border-opacity-75 lg:gap-12 lg:border-l-[1.25rem]">
    <div class="flex-1 px-6">

      <div class="mb-1 mt-auto font-semibold text-blue text-opacity-80">
        {{ get_the_date(null, $release->ID) }}
      </div>

      <h3 class="!mt-0 mb-2 text-lg font-semibold !leading-tight lg:text-xl">{{ $release->post_title }}
      </h3>

    </div>

    <x-icon.card-arrow class="group-hover:bg-pink group-hover:bg-opacity-40" />
  </div>
</a>
