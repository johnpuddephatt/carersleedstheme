<footer class="bg-blue pb-4 pt-12 text-white md:pt-24 lg:pb-8">
  <div class="container flex max-w-none flex-col justify-between gap-8 md:gap-16 lg:flex-row">
    <div>
      <x-logo class="!w-40 md:!w-48" :invert="true" />
      <div class="mt-2 max-w-lg text-blue-light">
        {{ get_field('company_info', 'option') }}
      </div>
    </div>
    <div class="lg:ml-auto">
      <div class="flex flex-col gap-8 md:gap-16 lg:flex-row">

        <div class="flex flex-row items-start gap-2 md:mt-2 lg:justify-end">
          @if (get_field('social_media', 'option'))
            @foreach (get_field('social_media', 'option') as $account)
              <a rel="noopener" class="inline-block rounded-full bg-white p-2 text-blue"
                aria-label="{{ $account['Type'] }} link" href="{{ $account['link'] }}" target="_blank">
                <x-dynamic-component :component="'icon.' . strtolower($account['Type'])" class="mt-4" />
              </a>
            @endforeach
          @endif
        </div>

        @if ($footerNavigation2)
          <div class="">
            <nav>
              <ul class="columns-2 gap-8 font-semibold">

                @foreach ($footerNavigation2 as $item)
                  <li>
                    <a class="inline-block" href="{{ $item->url }}">{{ $item->label }}</a>
                  </li>
                @endforeach

              </ul>
            </nav>
          </div>
        @endif

      </div>

    </div>

  </div>
  <div
    class="type-2xs container mt-8 flex max-w-none flex-col-reverse justify-between gap-8 text-white text-opacity-80 md:mt-16 md:items-end lg:flex-row">
    <div>
      <p><a href="https://letsdance.agency" target="_blank">Website by Let’s Dance</a></p>
      <p class="mt-0.5 flex items-center justify-end gap-0.5">
        Chat powered by:
        <a href="https://www.livechat.com/" target="_blank" class=""><img
            class="mt-0.5 h-auto w-[6rem] opacity-80 hover:opacity-100"
            src="https://cdn.livechatinc.com/website/media/img/resources/logos/livechat-white.svg" alt="LiveChat®"></a>
        <a href="https://www.chatbot.com/">
          <img src="https://cdn.livechatinc.com/website/media/img/resources/logos/chatbot-white-blue.svg"
            class="mt-0.5 h-auto w-[4.75rem] opacity-80 hover:opacity-100" alt="ChatBot"
            style="filter: saturate(0%) brightness(10);">
        </a>
      </p>
    </div>

    <div class="md:text-right">

      <div class="flex justify-end gap-4 md:ml-auto">
        <x-translate />

        <svg xmlns="http://www.w3.org/2000/svg" width="367.34" height="130.16" class="mb-2 h-auto w-28 text-white"
          viewBox="0 0 367.34 130.16">
          <defs>
            <style>
              .prefix__cls-2a4d {
                fill: currentColor
              }
            </style>
          </defs>
          <path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="4"
            d="M2 2h363.34v126.16H2z" />
          <path
            d="M4 4.08v122h122v-122Zm89.59 41.09c1.91-3.69 4.75-5.91 7.27-6.17a8.24 8.24 0 0 1 6.25 2.35 19.76 19.76 0 0 1 3.36 4.54l3.94-7.81.59 3.4c.52 3.2 0 4.53-1.44 7.25l-2 3.83a14.71 14.71 0 0 0-4.09-5c-2.15-1.52-3.55-1.85-5.73-1.39-2.81.58-6 3.93-7.39 8.08a27.72 27.72 0 0 0-1.74 9.55 21.63 21.63 0 0 0 .47 5.62 25.05 25.05 0 0 1-2.41-11.06 27.82 27.82 0 0 1 2.92-13.19Zm-10.08 42a12.31 12.31 0 0 1-6.45 4.48 12.86 12.86 0 0 1-1.66.35h-.13c-.31 0-.63 0-.94.06-.29 0-.57.05-.87.05h-.51a5.72 5.72 0 0 1-.59 0h-.15c-.32 0-.65-.07-1-.12-.35-.06-.7-.14-1-.23-.34-.1-.68-.2-1-.32-.33-.12-.65-.26-1-.41l-.28-.16h-.08c-.2-.1-.4-.2-.59-.31s-.61-.38-.91-.6a11.08 11.08 0 0 1-.88-.69 15.2 15.2 0 0 1-1.61-1.6 16 16 0 0 1-1.54-2.14c-.08-.12-.17-.24-.24-.37a20.21 20.21 0 0 1-1.78-3.88h6.78a18.85 18.85 0 0 0 1.76 2.44 7.1 7.1 0 0 0 1 .76 6.65 6.65 0 0 0 1.16.6 6.41 6.41 0 0 0 .75.21h.14l.3.08a6.45 6.45 0 0 0 1.17.1h.14a4.32 4.32 0 0 0 .88-.1h.22a5.3 5.3 0 0 0 .82-.28 5.9 5.9 0 0 0 .83-.5h.07a5.6 5.6 0 0 0 .78-.7 9.05 9.05 0 0 0 1.11-1.45 14 14 0 0 0 1.93-7.5 14.87 14.87 0 0 0-.85-5.3 8.25 8.25 0 0 0-.48-1l-.12-.24a9.93 9.93 0 0 0-.61-.93c-1.6-2.08-4.63-3.11-7.5-3.11h-4.5l11.1-19.38h-5.61c-6.81 0-5.68-.85-8 6.84l-11.9 40.26H51L41 58.75l-9.91 33.33h-.66L14.5 38.35h7l9.59 32.73L36 54.55c1.25-4.22 1.37-6.4 0-10.86l-1.59-5.34h7L51 71.08l7.22-24.54c2.1-7.15 3.32-8.18 9.38-8.18h21c-3.85 6.72-7.8 13.44-11.69 20.17.42.13.82.28 1.21.44s.61.27.91.42l.22.1a13.25 13.25 0 0 1 5.49 5.08 19.47 19.47 0 0 1 2.66 10.29 19.35 19.35 0 0 1-3.89 12.28Zm31.27-2.88a11.72 11.72 0 0 1-2.22 3.21 18.7 18.7 0 0 1-3.36 2.58 10.78 10.78 0 0 1-7.9 1.63c-4.26-.76-7.06-4.09-8.51-6a30.13 30.13 0 0 1-3-5.24c-.61-1.35-1.6-4.55-1.6-4.55s1.81 3.16 2.91 4.73a21.23 21.23 0 0 0 3.9 3.88 12 12 0 0 0 5.41 2.2 10.29 10.29 0 0 0 6.12-1 17.49 17.49 0 0 0 5.5-4.43 34.13 34.13 0 0 0 2.86-4.37l.51 2.65a9.44 9.44 0 0 1-.62 4.68Z"
            class="prefix__cls-2a4d" />

          <path
            d="M255.77 61.88h-7.36l-4.12-16c-.16-.57-.42-1.74-.79-3.52s-.57-3-.63-3.6c-.08.75-.29 2-.62 3.62s-.6 2.83-.78 3.54l-4.1 16H230l-7.77-30.46h6.35l3.9 16.63q1 4.61 1.48 8c.08-.79.27-2 .56-3.67s.59-3 .85-3.87l4.44-17.07H246l4.44 17.07c.2.76.44 1.93.73 3.5s.51 2.91.67 4c.14-1.09.36-2.43.66-4s.59-2.94.84-3.94l3.87-16.63h6.36Zm29.39 0L283 54.63h-11.1l-2.21 7.25h-7l10.74-30.58h7.9l10.79 30.58Zm-3.75-12.67L278 38.07q-.37-1.29-.54-2-.69 2.65-3.94 13.18Zm25.94 12.67H293.5v-3.67l3.7-1.7V36.8l-3.7-1.71v-3.67h13.85v3.67l-3.71 1.71v19.71l3.71 1.7Zm2.65-8.83v-5.21h11.18v5.21Z"
            class="prefix__cls-2a4d" transform="translate(0 .08)" />
          <path
            d="m344.93 61.88-2.21-7.25h-11.1l-2.21 7.25h-7L333.2 31.3h7.9l10.79 30.58Zm-3.75-12.67-3.46-11.14q-.37-1.29-.54-2-.69 2.65-3.93 13.18Z"
            class="prefix__cls-2a4d" transform="translate(0 .08)" />

          <path
            d="M186.61 110.16h-7.35l-4.13-16c-.15-.57-.41-1.75-.79-3.52s-.57-3-.62-3.61q-.14 1.13-.63 3.63c-.33 1.65-.59 2.83-.77 3.54l-4.1 16h-7.34l-7.77-30.5h6.36l3.89 16.62q1 4.61 1.48 8c.08-.79.27-2 .56-3.66s.59-3 .86-3.88l4.43-17.06h6.11l4.44 17.06c.19.76.43 1.93.73 3.5s.51 2.92.66 4c.14-1.08.36-2.43.67-4s.58-2.94.83-3.94L188 79.7h6.35Zm24.31-25.52a6.54 6.54 0 0 0-5.64 2.75c-1.34 1.82-2 4.36-2 7.62q0 10.18 7.64 10.19a24.16 24.16 0 0 0 7.77-1.61V109a21.6 21.6 0 0 1-8.37 1.56q-6.65 0-10.17-4T196.63 95a18.83 18.83 0 0 1 1.73-8.31 12.42 12.42 0 0 1 5-5.48 14.67 14.67 0 0 1 7.6-1.92 20.53 20.53 0 0 1 8.92 2.15l-2.08 5.25a32.43 32.43 0 0 0-3.44-1.42 10.33 10.33 0 0 0-3.44-.63Zm32.9 25.52-2.21-7.25h-11.1l-2.21 7.25h-7l10.75-30.59H240l10.79 30.59Zm-3.75-12.67-3.46-11.15q-.37-1.29-.54-2-.69 2.67-3.94 13.19Zm25.69-4.44h12.08v15.79a33.09 33.09 0 0 1-5.54 1.34 35.41 35.41 0 0 1-5.29.39q-6.9 0-10.54-4t-3.63-11.64q0-7.38 4.21-11.5t11.71-4.13a22.64 22.64 0 0 1 9 1.88l-2.15 5.16a15.3 15.3 0 0 0-6.93-1.66 8.54 8.54 0 0 0-6.68 2.77 10.89 10.89 0 0 0-2.51 7.55c0 3.31.67 5.83 2 7.58a7.05 7.05 0 0 0 5.91 2.61 20.78 20.78 0 0 0 4.11-.42v-6.34h-5.77Zm49.58 17.11h-21.29v-4.48l7.64-7.68c2.27-2.32 3.75-3.93 4.44-4.81a10.63 10.63 0 0 0 1.5-2.5 6.3 6.3 0 0 0 .46-2.38 3.45 3.45 0 0 0-1-2.73 3.87 3.87 0 0 0-2.69-.89 7.82 7.82 0 0 0-3.44.81 17.39 17.39 0 0 0-3.47 2.31l-3.49-4.2a23 23 0 0 1 3.72-2.7 13.55 13.55 0 0 1 3.23-1.21 16.32 16.32 0 0 1 3.92-.44 11.67 11.67 0 0 1 5 1 8.12 8.12 0 0 1 3.4 2.92 7.79 7.79 0 0 1 1.21 4.29 10.49 10.49 0 0 1-.75 4 14.75 14.75 0 0 1-2.3 3.77 54.12 54.12 0 0 1-5.45 5.52l-3.92 3.69v.29h13.27Zm3.83-3a3.52 3.52 0 0 1 .94-2.65 3.81 3.81 0 0 1 2.73-.89 3.68 3.68 0 0 1 2.67.91 3.47 3.47 0 0 1 1 2.63 3.52 3.52 0 0 1-1 2.6 3.64 3.64 0 0 1-2.67.94 3.77 3.77 0 0 1-2.71-.92 3.49 3.49 0 0 1-1-2.62Zm32.73 3h-21.29v-4.48l7.65-7.68c2.26-2.32 3.74-3.93 4.43-4.81a10.63 10.63 0 0 0 1.5-2.5 6.3 6.3 0 0 0 .46-2.38 3.45 3.45 0 0 0-1-2.73 3.85 3.85 0 0 0-2.69-.89 7.74 7.74 0 0 0-3.43.81 17.73 17.73 0 0 0-3.53 2.26l-3.5-4.15a22.53 22.53 0 0 1 3.73-2.7 13.24 13.24 0 0 1 3.23-1.21 16.18 16.18 0 0 1 3.91-.44 11.6 11.6 0 0 1 5 1 8.06 8.06 0 0 1 3.4 2.92 7.71 7.71 0 0 1 1.21 4.29 10.49 10.49 0 0 1-.75 4 15 15 0 0 1-2.23 3.77 55.6 55.6 0 0 1-5.46 5.52l-3.92 3.69v.29h13.28Z"
            class="prefix__cls-2a4d" transform="translate(0 .08)" />
        </svg>
      </div>

      @if ($footerNavigation)
        <div class="type-2xs mt-4 text-opacity-90">
          <nav>
            <ul class="flex flex-row gap-3 md:justify-end">

              @foreach ($footerNavigation as $item)
                <li>
                  <a class="inline-block" href="{{ $item->url }}">{{ $item->label }}</a>
                </li>
              @endforeach

            </ul>
          </nav>
        </div>
      @endif

    </div>
  </div>

</footer>
