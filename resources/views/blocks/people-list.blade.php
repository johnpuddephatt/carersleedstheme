<div class="wp-block {{ $block->classes }}" style="{{ $block->inlineStyle }}">
  @if ($title)
    <h2 class="text-blue">{{ $title }}</h2>
  @endif
  @if ($description)
    <p class="-mt-4 mb-8">{!! $description !!}</p>
  @endif
  @if ($people)
    <div class="space-y-4">
      @foreach ($people as $person)
        <details x-data="{ open: false }">
          <summary @click="console.log(open);open = !open" style="font-size: 1em !important;"
            class="not-prose group relative flex flex-row items-center gap-2 p-4 transition md:gap-4 md:p-6">

            <div class="overflow-hidden rounded-full">
              {!! get_the_post_thumbnail($person->ID, 'square', [
                  'class' => ' h-auto !my-0 block w-24 group-hover:scale-105 ease-in-out transition-transform duration-1000',
              ]) !!}
            </div>

            <div class="py-2">
              <h3 class="type-sm md:type-md">{{ $person->post_title }}</h3>
              <div class="font-normal">{{ get_field('role_title', $person->ID) }}</div>
            </div>

            {{-- <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
              <x-icon.plus x-show="!open" class="h-6 w-6 text-blue" />
              <x-icon.minus x-show="open" class="h-6 w-6 text-blue" />
            </div> --}}
          </summary>

          <div class="p-4 pt-0 md:p-6">
            {!! $person->post_content !!}
          </div>
        </details>
      @endforeach
    </div>
  @endif
</div>
