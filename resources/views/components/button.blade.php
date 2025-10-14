@props(['label', 'url', 'invert' => false, 'click' => null])

<a href="{{ $url }}" {{ $click ? ' onclick="' . $click . '"' : '' }}
  {{ $attributes->merge(['class' => ($invert ? 'bg-blue-bright ' : '') . ' border-blue-bright inline-block rounded-small border-2 px-10 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20']) }}>{{ $label }}
</a>
