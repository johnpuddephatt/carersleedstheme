<div
  class="{{ $background_colour ?? 'bg-green' }} relative mb-8 flex flex-col-reverse overflow-hidden md:mb-12 md:h-[33vw] md:max-h-[36rem] md:min-h-[24rem] md:flex-row md:items-center xl:mb-24">
  <svg class="absolute -bottom-4 -right-6 h-auto w-3/5 md:-left-16 md:top-1/2 md:-translate-y-1/2"
    xmlns="http://www.w3.org/2000/svg" width="988.81" height="992.23" viewBox="0 0 988.81 992.23">
    <path fill="#fff"
      d="M197.36 894.69a60.49 60.49 0 0 1-36.48-47.92l-30.92-239.31a60.48 60.48 0 0 1 23.24-55.72l191.76-146.48a60.55 60.55 0 0 1 59.83-7.76l193.48 80.65 143.36-109.5-23-177.81-165.5-69L91.67 474.29a57 57 0 0 1-79.95-10.71 57 57 0 0 1 10.7-79.95L508.49 12.37a60.45 60.45 0 0 1 59.9-7.72L791.1 97.47l.15.07a60.53 60.53 0 0 1 36.48 47.85l31 239.39a60.54 60.54 0 0 1-23.24 55.72L642.83 587.64a60.84 60.84 0 0 1-23.75 11 60 60 0 0 1-36.1-3.24l-193.46-80.65-142.49 108.83 23 177.81 165.49 69 461.63-352.6a57.041 57.041 0 0 1 69.25 90.66L480.13 979.86a60.55 60.55 0 0 1-59.83 7.76l-222.78-92.86Z"
      opacity="{{ isset($background_colour) && str_contains($background_colour, 'bg-blue') ? 0.05 : 0.12 }}" />
  </svg>

  <div class="container relative w-full flex-none py-8 md:static md:w-1/2 md:py-16 lg:max-w-xl">
    <div
      class="{{ isset($background_colour) ? str_replace('bg-', 'from-', $background_colour) : 'from-green' }} pointer-events-none absolute right-0 top-0 h-full w-[60%] origin-center bg-gradient-to-r from-15% to-transparent md:left-0 md:right-auto md:w-1/3">
    </div>
    <h1 class="relative mb-2 max-w-md  text-4xl antialiased md:mb-4 lg:mb-8 lg:text-6xl">
      {!! $title ?? get_the_title() !!}</h1>
    <div class="relative max-w-md text-lg font-semibold xl:text-xl">
      {!! $excerpt ?? get_the_excerpt() !!}
    </div>
  </div>

  <div class="md:w-1/2 md:self-stretch">
    {!! get_the_post_thumbnail($page_id ?? null, '3by2', [
        'class' => 'aspect-[2] md:aspect-auto md:clip-hex-left w-full max-w-none h-full flex-none block object-cover',
    ]) !!}
  </div>
</div>
