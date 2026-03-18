<div class="bg-white dark:bg-slate-800 rounded-xl p-4 shadow-lg flex flex-col gap-3 hover:shadow-xl transition-shadow">
<div class="aspect-[3/4] w-full rounded-lg overflow-hidden bg-slate-100 mb-2">
@if($book->cover_url)
<img class="w-full h-full object-contain" data-alt="{{ $book->title }} book cover" src="{{ $book->cover_url }}"/>
@else
<div class="w-full h-full bg-slate-200 flex items-center justify-center">
<span class="material-symbols-outlined text-slate-400">auto_stories</span>
</div>
@endif
</div>
<div class="flex flex-col gap-1">
<h4 class="text-sm font-bold line-clamp-1">{{ $book->title }}</h4>
<p class="text-xs text-slate-500 dark:text-slate-400">{{ $book->author->full_name ?? 'Unknown' }}</p>
<div class="flex items-center justify-between mt-1">
<span class="text-sm font-bold text-primary">{{ number_format($book->selling_price, 0, ',', '.') }}VND</span>
<button class="p-1 rounded-full bg-primary/10 text-primary">
<span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
</button>
</div>
</div>
</div>