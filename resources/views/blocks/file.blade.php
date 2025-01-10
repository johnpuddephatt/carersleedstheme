 <a href="{{ $file['url'] }}" download
   class="{{ $block->classes }} wp-block not-prose group flex items-center rounded-2xl bg-green-light p-8 !no-underline"
   style="{{ $block->inlineStyle }}; font-size: 1em;">
   <x-icon.document class="mr-4 size-10 text-green" />
   <div>
     <h3 class="type-md">{{ $name ?: $file['title'] }}</h3>
     <div class="font-normal">{{ $description ?: $file['description'] }}</div>
   </div>
   <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
     <x-icon.card-arrow class="h-6 w-6 rotate-90 text-green" />
   </div>
 </a>
