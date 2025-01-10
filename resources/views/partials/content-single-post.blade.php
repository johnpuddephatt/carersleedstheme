<article @php(post_class())>
  @include('partials.post-header')

  <div class="container mb-24">
    <div class="post-content prose xl:prose-lg">
      @php(the_content())
    </div>
  </div>
</article>
