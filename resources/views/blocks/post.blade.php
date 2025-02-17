@if ($post_signpost)
  <x-post-card class="my-12 2xl:my-16" :post="$post_signpost" :show_excerpt="false" />
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Select a post to get started.
  </div>
@endif
