<article @php(post_class())>
  // content-single.blade.php
  <div class="container mb-24">
    <div class="post-content prose xl:prose-lg">
      @php(the_content())
    </div>
  </div>
</article>
