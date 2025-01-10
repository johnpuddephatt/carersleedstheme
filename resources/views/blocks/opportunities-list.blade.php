<div class="{{ $block->classes }} not-prose my-16" style="{{ $block->inlineStyle }}">
  <h2 class="type-lg mb-12 text-blue-dark">{{ $title }}</h2>
  <div class="flex flex-col gap-4">
    @forelse ($opportunities as $opportunity)
      <x-opportunity-card :opportunity="$opportunity" />
    @empty
      <p class="rounded-2xl bg-pink-light p-8 text-center">No opportunities to show you.</p>
    @endforelse
  </div>
</div>
