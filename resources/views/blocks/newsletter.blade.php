<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.73 199.14"
  class="absolute left-0 -z-10 h-auto w-64 -translate-y-1/4">
  <circle cx="39.14" cy="189.47" r="9.66" fill="#65bec5" />
  <path
    d="M52.01 9.68C38.78-1.49 18.39-3.2 3.49 5.63c-1.2.71-2.36 1.48-3.49 2.3v155.36c10.04-2.26 19.05-9.27 23.19-18.74 5.07-11.62 3.04-25.2 6.96-37.26 6.3-19.41 26.64-31.41 33.96-50.47 6.21-16.15 1.12-35.98-12.1-47.15Z"
    fill="#65bec5" />
</svg>

<div
  class="wp-block {{ $block->classes }} {{ $block->block->align == 'full' ? '' : 'my-16 2xl:my-24' }} not-prose relative mx-auto overflow-hidden pb-24"
  style="{{ $block->inlineStyle }}">

  <div
    class="{{ $block->block->align == 'full' ? '' : 'rounded-big' }} relative mx-4 flex flex-row justify-between gap-6 bg-beige p-12 xl:p-16">
    <div
      class="{{ $block->block->align == 'full' ? 'max-w-xl text-xl' : 'max-w-lg' }} flex flex-col justify-around py-8">
      <div>
        <h1 class="type-xl mb-4">{{ $heading }}</h1>
        <div>{!! $content !!}</div>
      </div>
      <form id="mc-embedded-subscribe-form" class="validate pt-4" action="{{ $mailchimp_form_url }}" method="post"
        name="mc-embedded-subscribe-form" novalidate="" target="_blank">
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input tabindex="-1"
            name="b_27860ab2b8185d0189fb1222c_b2ae2b005f" type="text" value=""></div>

        <div class="flex">
          <input id="mce-EMAIL" class="email rounded-l-full border bg-transparent px-6 py-2" name="EMAIL"
            required="" type="email" value="" placeholder="Your Email Address">
          <input class="rounded-r-full bg-black px-6 py-2 text-white" id="mc-embedded-subscribe" name="subscribe"
            type="submit" value="Subscribe" />
        </div>
      </form>
    </div>
    <div class="w-2/5 max-w-96 flex-none py-6">
      @if ($image)
        {!! wp_get_attachment_image($image, 'landscape', false, [
            'sizes' => '25vw',
            'class' => ' rounded-full object-cover aspect-square h-auto w-full',
        ]) !!}
      @endif
    </div>
  </div>

</div>
