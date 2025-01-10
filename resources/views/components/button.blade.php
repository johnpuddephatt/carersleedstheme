@props(['label', 'url', 'invert' => false])

<a href="{{ $url }}"
  {{ $attributes->merge(['class' => ($invert ? 'bg-blue-bright ' : '') . ' border-blue-bright inline-block rounded-2xl border-2 px-10 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20']) }}>{{ $label }}</a>
