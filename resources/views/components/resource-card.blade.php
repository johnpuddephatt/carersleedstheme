<a href="{{ get_permalink($resource->ID) }}"
  class="wp-block not-prose group relative block overflow-hidden rounded bg-white font-normal !no-underline transition">
  <div
    class="flex flex-row items-center border-l-8 border-gold border-opacity-75 bg-gold bg-opacity-30 bg-clip-padding transition hover:bg-opacity-40 lg:border-l-[1.25rem]">

    <div class="flex-1 px-6 pb-2 pt-4">
      <div class="mb-1 leading-tight text-blue text-opacity-80">
        {{ get_the_date('F Y', $resource->ID) }}

      </div>

      <h3 class="text-lg font-semibold !leading-tight md:text-xl lg:text-2xl">{{ $resource->post_title }}
      </h3>

      <div class="mt-2.5 flex flex-row items-center gap-0.5 lg:gap-1">

        @foreach (get_the_terms($resource->ID, 'resource_type') as $term)
          <div
            class="type-2xs hidden rounded-full bg-white bg-opacity-60 px-2.5 py-0.5 lowercase antialiased lg:inline-block">
            {{ $term->name }}
          </div>
        @endforeach
      </div>
    </div>
    <x-icon.card-arrow class="group-hover:bg-gold group-hover:bg-opacity-30" />
  </div>
</a>
