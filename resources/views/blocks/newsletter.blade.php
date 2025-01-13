  <div class="wp-block {{ $block->classes }} not-prose relative mx-auto overflow-hidden pb-24"
    style="{{ $block->inlineStyle }}">

    <div
      class="{{ $block->block->align == 'full' ? '' : 'rounded-big my-16 2xl:my-24' }} fle relative mx-4 flex-row justify-between gap-6 bg-beige p-12 xl:p-16">
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

    <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-0" viewBox="0 0 190.26 167.2">
      <path fill="#65bec5"
        d="M12.3 66.61c9.12-6.22 19.97-8.88 30.96-7.79 10.98 1.09 22.37 3.49 32.82-.05 22.02-7.47 28.27-36.2 46.72-50.35 13.74-10.53 34.19-11.26 48.65-1.74 14.45 9.52 21.86 28.6 17.61 45.38-5 19.79-23.77 34.12-27.73 54.14-2.45 12.44 1.17 25.68-2.48 37.82-3.85 12.78-16.27 22.49-29.6 23.14-5.61.28-11.22-1.06-16.21-3.62-10.93-5.61-22.87-8.9-35.12-9.79-18.5-1.34-42.08-2.25-64.84-27.65-9.51-10.61-23.54-43.98-.78-59.49Z"
        opacity=".3" />
    </svg>

  </div>
