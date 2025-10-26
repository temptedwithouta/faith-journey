<x-layout>
    <x-slot:title>
        Devotions
    </x-slot>

    <!-- Hero Section -->
    <section class="bg-primary py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Daily <span class="text-accent">Devotion</span>
                </h1>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Find inspiration and spiritual strength through meaningful articles for your faith journey.
                </p>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="bg-white py-8 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Search -->
                <div class="flex-1 max-w-lg">
                    <div class="relative">
                        <input type="text" placeholder="Search devotion..."
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent"
                            x-bind:value="getQueryParams('{{ URL::full() }}', 'search')"
                            @@keyup.enter="redirect('{{ URL::full() }}', [{name: 'search', value: $event.target.value
                            }])">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="flex gap-4">
                    <select
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        x-bind:value="getQueryParams('{{ URL::full() }}', 'filterCategory') ?? 'default'"
                        x-on:change="redirect('{{ URL::full() }}', [{name: 'filterCategory', value: $event.target.value}])">
                        <option value="All Categories">All Categories</option>
                        @if (isset($categories))
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No Categories Available</option>
                        @endif
                    </select>

                    <select
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        x-bind:value="getQueryParams('{{ URL::full() }}', 'orderBy') ?? 'Newest'"
                        x-on:change="redirect('{{ URL::full() }}', [{name: 'orderBy', value: $event.target.value}])">
                        <option value="Newest">Newest</option>
                        <option value="Most Popular">Most Popular</option>
                        <option value="Oldest">Oldest</option>
                    </select>
                </div>
            </div>
    </section>

    <!-- Featured Devotion -->
    <section class="py-12 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-primary mb-8 text-center">Featured Devotion</h2>
            @if (isset($featuredDevotion))
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <div class="bg-secondary h-64 md:h-full flex items-center justify-center">
                                <i class="fas fa-dove text-8xl text-white"></i>
                            </div>
                        </div>
                        <div class="md:w-1/2 p-8">
                            <div class="text-secondary text-sm font-semibold mb-2">
                                <i class="fas fa-calendar mr-2"></i>{{ $featuredDevotion->created_at->format('d M Y') }}
                                <span class="mx-2">•</span>
                                <i class="fas fa-tag mr-2"></i>{{ $featuredDevotion->category_name }}
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-primary mb-4">
                                {{ $featuredDevotion->title }}
                            </h3>
                            {{-- <p class="text-gray-600 mb-6 leading-relaxed">
                                {{ Str::limit($featuredDevotion->body, 100) }}
                            </p> --}}
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-semibold text-primary">
                                            {{ $featuredDevotion->author_name }}
                                        </p>
                                        <p class="text-xs text-gray-500">Author</p>
                                    </div>
                                </div>
                                <a href="{{ route('devotions.show', ['devotion' => $featuredDevotion->id]) }}"
                                    class="bg-secondary hover:bg-opacity-90 text-white px-6 py-2 rounded-lg font-semibold transition duration-300">
                                    Read Article
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            @else
                <div class="col-span-3 text-center text-gray-500">
                    No featured devotion available.
                </div>
            @endif
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-12 bg-white">
        @if (isset($devotions))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-primary mb-8"
                    x-text="`${getQueryParams('{{ URL::full() }}', 'orderBy') ?? 'Newest'} Devotions`"></h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- <!-- Article 1 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-accent h-48 flex items-center justify-center">
                        <i class="fas fa-praying-hands text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                            <i class="fas fa-calendar mr-2"></i>15 September 2024
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i>Doa
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-3">Kekuatan Doa dalam Keseharian</h3>
                        <p class="text-gray-600 mb-4">
                            Bagaimana doa dapat menjadi sumber kekuatan dan kedamaian dalam menghadapi tantangan hidup
                            sehari-hari...
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span>Maria Sari</span>
                            </div>
                            <a href="#"
                                class="text-secondary hover:text-primary font-semibold transition duration-300">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-primary h-48 flex items-center justify-center">
                        <i class="fas fa-heart text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                            <i class="fas fa-calendar mr-2"></i>12 September 2024
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i>Kasih
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-3">Mengasihi Sesama dengan Tulus</h3>
                        <p class="text-gray-600 mb-4">
                            Refleksi tentang pentingnya mengasihi sesama sebagai wujud nyata dari iman yang kita
                            yakini...
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span>David Lim</span>
                            </div>
                            <a href="#"
                                class="text-secondary hover:text-primary font-semibold transition duration-300">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article> --}}

                    <!-- Article 3 -->
                    @foreach ($devotions as $devotion)
                        <x-devotion-item :devotion="$devotion" />
                    @endforeach



                    {{-- <!-- Article 4 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-accent h-48 flex items-center justify-center">
                        <i class="fas fa-hands-helping text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                            <i class="fas fa-calendar mr-2"></i>8 September 2024
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i>Pelayanan
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-3">Melayani dengan Sukacita</h3>
                        <p class="text-gray-600 mb-4">
                            Bagaimana kita dapat melayani Tuhan dan sesama dengan hati yang penuh sukacita dan
                            ketulusan...
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span>Pastor Michael</span>
                            </div>
                            <a href="#"
                                class="text-secondary hover:text-primary font-semibold transition duration-300">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Article 5 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-primary h-48 flex items-center justify-center">
                        <i class="fas fa-family text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                            <i class="fas fa-calendar mr-2"></i>5 September 2024
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i>Keluarga
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-3">Membangun Keluarga Kristen</h3>
                        <p class="text-gray-600 mb-4">
                            Prinsip-prinsip alkitabiah untuk membangun keluarga yang harmonis dan takut akan Tuhan...
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span>Ruth Wijaya</span>
                            </div>
                            <a href="#"
                                class="text-secondary hover:text-primary font-semibold transition duration-300">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Article 6 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-secondary h-48 flex items-center justify-center">
                        <i class="fas fa-star text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                            <i class="fas fa-calendar mr-2"></i>3 September 2024
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag mr-2"></i>Harapan
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-3">Harapan yang Tidak Pernah Sirna</h3>
                        <p class="text-gray-600 mb-4">
                            Di tengah ketidakpastian dunia, harapan kita tetap kokoh karena tertancap pada janji-janji
                            Tuhan...
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-user-circle mr-2"></i>
                                <span>Joshua Tan</span>
                            </div>
                            <a href="#"
                                class="text-secondary hover:text-primary font-semibold transition duration-300">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article> --}}
                </div>
            </div>
        @else
            <div class="col-span-3 text-center text-gray-500">
                No devotions found.
            </div>
        @endif
    </section>

    <!-- Pagination -->
    @if (isset($devotions))
        <x-devotion-pagination :paginator=$devotions />
    @endif
</x-layout>
