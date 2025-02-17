@if ($post_signpost)
  <x-post-card class="my-16 2xl:my-24" :post="$post_signpost" :show_excerpt="false" />
@elseif($block->preview)
  <div class="rounded-small bg-beige-light p-8">
    Select a post to get started.
  </div>
@endif
