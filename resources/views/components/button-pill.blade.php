@props(['label', 'url', 'invert' => false])

<a href="{{ $url }}"
  {{ $attributes->merge(['class' => ($invert ? 'bg-blue-bright ' : '') . ' group mx-auto flex w-full max-w-md items-center justify-between rounded-r-full bg-beige px-3 py-3']) }}>

  <h3 class="type-sm md:type-md truncate font-semibold">{!! $label !!}</h3>

  <x-icon.card-arrow
    class="-translate-x-1/2 text-beige-dark opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100" />
</a>
