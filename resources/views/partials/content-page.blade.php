<article @php(post_class())>
  <div class="container mx-auto min-h-screen xl:max-w-5xl 2xl:max-w-6xl">
    <div class="flex flex-col gap-12 pb-32 lg:flex-row-reverse">
      <div
        class="max-w-screen-sm border-t border-blue-bright max-lg:rounded-3xl max-lg:bg-blue-light max-lg:p-4 max-sm:-mx-4 lg:w-48 xl:pt-16">
        <div class="top-16 mx-auto lg:sticky">
          {!! $toc !!}
        </div>
      </div>
      <div class="flex-1 lg:px-0">
        <div class="page-content prose xl:prose-lg" id="overview">
          {!! $content !!}
        </div>
      </div>
    </div>
  </div>
</article>
