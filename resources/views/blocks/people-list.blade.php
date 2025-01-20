<div class="wp-block not-prose {{ $block->classes }}" style="{{ $block->inlineStyle }}">
  @if ($title)
    <h3 class="type-lg mb-8">{{ $title }}</h3>
  @endif
  @if ($people)
    <div class="space-y-4">
      @foreach ($people as $person)
        <details>
          <summary style="font-size: 1em !important;"
            class="group relative flex flex-row items-center gap-2 rounded-2xl p-4 transition md:gap-4 md:p-6">

            <div class="overflow-hidden rounded-full">
              {!! get_the_post_thumbnail($person->ID, 'square', [
                  'class' => ' h-auto !my-0 block w-24 group-hover:scale-105 ease-in-out transition-transform duration-1000',
              ]) !!}
            </div>

            <div class="py-2">
              <h3 class="type-sm md:type-md">{{ $person->post_title }}</h3>
              <div class="font-normal">{{ get_field('role_title', $person->ID) }}</div>
            </div>

            <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
              <x-icon.card-arrow class="h-6 w-6 text-blue open:rotate-90" />
            </div>
          </summary>

          <div class="p-4 pt-0 md:p-6">
            {!! $person->post_content !!}
          </div>
        </details>
      @endforeach
    </div>
  @endif
</div>
