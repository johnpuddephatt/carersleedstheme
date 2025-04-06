  <div class="mx-auto block w-full max-w-md border-b-2 border-blue-bright">
    <div class="mb-4 overflow-hidden md:mb-6">
      @if ($image)
        {!! wp_get_attachment_image($image, 'landscape', false, [
            'sizes' => '25vw',
            'class' => ' object-cover aspect-[2] md:aspect-auto w-full block h-auto ',
        ]) !!}
      @else
        <div
          class="block aspect-[2] h-auto w-full bg-blue-light transition-transform duration-1000 group-hover:scale-105 md:aspect-[3/2]">
        </div>
      @endif
    </div>
    <div class="pb-4">
      <h3 class="type-md pb-2">{!! $title !!}</h3>

      @foreach ($children as $child)
        <a href="{{ get_the_permalink($child->ID) }}" class="group flex justify-between gap-1 !font-medium">
          {{ get_the_title($child->ID) }}

          <x-icon.card-arrow stroke="1" class="mt-1 flex-none text-blue" />
        </a>
      @endforeach
    </div>
  </div>
