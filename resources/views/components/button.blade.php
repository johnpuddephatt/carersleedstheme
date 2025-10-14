@props(['label', 'url', 'invert' => false, 'onclick' => null])

<a href="{{ $url }}" {{ $onclick ? ' onclick="' . $onclick . '"' : '' }}
  {{ $attributes->merge(['class' => ($invert ? 'bg-blue-bright ' : '') . ' border-blue-bright inline-block rounded-small border-2 px-10 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20']) }}>{{ $label }}
  {{ $onclick }}</a>
