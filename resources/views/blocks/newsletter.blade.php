  <div class="wp-block {{ $block->classes }} not-prose container mx-auto overflow-hidden""
    style="{{ $block->inlineStyle }}">

    <div
      class="{{ $block->block->align == 'full' ? '' : 'rounded-3xl my-16 2xl:my-24' }} relative flex flex-row items-center justify-between gap-6 bg-beige p-8 xl:p-16">
      <div
        class="{{ $block->block->align == 'full' ? 'max-w-xl text-xl' : 'max-w-lg' }} flex flex-col justify-around py-8">
        <div>
          <h1 class="type-xl mb-4">{{ $heading }}</h1>
          <div>{!! $content !!}</div>
        </div>
        <form id="mc-embedded-subscribe-form" class="validate mt-auto pt-4" action="{{ $mailchimp_form_url }}"
          method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
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
