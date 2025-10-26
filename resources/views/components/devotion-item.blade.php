<article
    class="h-full flex flex-col bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
    <div class="basis-1 h-full py-12 bg-secondary flex items-center justify-center">
        <i class="fas fa-bible text-6xl text-white"></i>
    </div>
    <div class="flex-1 flex flex-col h-full justify-between p-6">
        <div class="flex flex-col justify-between">
            <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                <i class="fas fa-calendar mr-2"></i>{{ $devotion->created_at->format('d M Y') }}
                <span class="mx-2">•</span>
                <i class="fas fa-tag mr-2"></i>{{ $devotion->category_name }}
            </div>
            <h3 class="text-xl font-bold text-primary mb-3">{{ $devotion->title }}</h3>
            {{-- <p class="text-gray-600 mb-4">
                    {{ Str::limit($devotion->body, 100) }}
                </p> --}}
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-user-circle mr-2"></i>
                <span>{{ $devotion->author_name }}</span>
            </div>
            <a href="{{ route('devotions.show', [
                'devotion' => $devotion->id,
            ]) }}"
                class="text-secondary hover:text-primary font-semibold transition duration-300">
                Read <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</article>
