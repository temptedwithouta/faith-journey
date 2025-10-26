<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <!-- Hero Section -->
    <section class="bg-light py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-primary mb-6">
                    Welcome to <span class="text-secondary">Faith Journey</span>
                </h1>
                <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto">
                    Join us on a meaningful faith journey. Discover strength, hope, and peace through inspiring daily
                    devotions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('devotions.index') }}"
                        class="bg-secondary hover:bg-opacity-90 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 flex items-center justify-center">
                        <i class="fas fa-book-open mr-2"></i>
                        Start Reading
                    </a>
                    <a href="{{ route('users.register') }}"
                        class="bg-primary hover:bg-opacity-90 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i>
                        Join Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary mb-4">Featured Devotions</h2>
                <p class="text-gray-600 text-lg">
                    Find spiritual inspiration in our curated devotions
                </p>
            </div>

            @if (isset($featuredDevotions))
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($featuredDevotions as $devotion)
                        {{-- <article
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="bg-secondary h-48 flex items-center justify-center">
                            <i class="fas fa-bible text-6xl text-white"></i>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-secondary text-sm font-semibold mb-3">
                                <i class="fas fa-calendar mr-2"></i>{{ $devotion->created_at->format('d M Y') }}
                                <span class="mx-2">•</span>
                                <i class="fas fa-tag mr-2"></i>{{ $devotion->category_name }}
                            </div>
                            <h3 class="text-xl font-bold text-primary mb-3">{{ $devotion->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($devotion->body, 100) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user-circle mr-2"></i>
                                    <span>{{ $devotion->author_name }}</span>
                                </div>
                                <a href="{{ route('devotions.show', ['devotion' => $devotion->id]) }}"
                                    class="text-secondary hover:text-primary font-semibold transition duration-300">
                                    Read <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </article> --}}

                        <x-devotion-item :devotion="$devotion" />
                    @endforeach
                    <!-- Featured Post 1 -->
                    {{-- <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-accent h-48 flex items-center justify-center">
                        <i class="fas fa-praying-hands text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="text-secondary text-sm font-semibold mb-2">15 September 2024</div>
                        <h3 class="text-xl font-bold text-primary mb-3">Kekuatan Doa dalam Keseharian</h3>
                        <p class="text-gray-600 mb-4">
                            Bagaimana doa dapat menjadi sumber kekuatan dan kedamaian dalam menghadapi tantangan hidup
                            sehari-hari...
                        </p>
                        <a href="#"
                            class="text-secondary hover:text-primary font-semibold transition duration-300">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Featured Post 2 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-secondary h-48 flex items-center justify-center">
                        <i class="fas fa-heart text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="text-secondary text-sm font-semibold mb-2">12 September 2024</div>
                        <h3 class="text-xl font-bold text-primary mb-3">Mengasihi Sesama dengan Tulus</h3>
                        <p class="text-gray-600 mb-4">
                            Refleksi tentang pentingnya mengasihi sesama sebagai wujud nyata dari iman yang kita
                            yakini...
                        </p>
                        <a href="#"
                            class="text-secondary hover:text-primary font-semibold transition duration-300">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Featured Post 3 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-primary h-48 flex items-center justify-center">
                        <i class="fas fa-bible text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="text-secondary text-sm font-semibold mb-2">10 September 2024</div>
                        <h3 class="text-xl font-bold text-primary mb-3">Menemukan Hikmat dalam Firman</h3>
                        <p class="text-gray-600 mb-4">
                            Bagaimana Firman Tuhan dapat memberikan pencerahan dan bimbingan dalam setiap langkah hidup
                            kita...
                        </p>
                        <a href="#"
                            class="text-secondary hover:text-primary font-semibold transition duration-300">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article> --}}
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('devotions.index') }}"
                        class="bg-primary hover:bg-opacity-90 text-white px-8 py-3 rounded-lg font-semibold transition duration-300 inline-flex items-center">
                        <i class="fas fa-book-open mr-2"></i>
                        See All Devotions
                    </a>
                </div>
            @else
                <div class="text-center text-gray-500">
                    No featured devotions available at the moment.
                </div>
            @endif

        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-6">About Faith Journey</h2>
                    <p class="text-gray-700 mb-4 text-lg">
                        Faith Journey is a digital platform dedicated to supporting your faith journey.
                        We provide daily devotions, inspiring articles, and spiritual resources that can
                        strengthen your relationship with God.
                    </p>
                    <p class="text-gray-700 mb-6 text-lg">
                        With a supportive community, we believe that everyone can experience meaningful
                        spiritual growth in their daily lives.
                    </p>
                    <a href="#"
                        class="bg-secondary hover:bg-opacity-90 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 inline-flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Learn More
                    </a>
                </div>
                <div class="bg-accent rounded-lg p-8 text-center">
                    <i class="fas fa-users text-6xl text-white mb-6"></i>
                    <h3 class="text-2xl font-bold text-white mb-4">Join the Community</h3>
                    <p class="text-white mb-6">
                        Thousands have experienced blessings through Faith Journey.
                        Be a part of a community that strengthens each other in faith.
                    </p>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-3xl font-bold text-white">5K+</div>
                            <div class="text-sm text-white opacity-80">Readers</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-white">500+</div>
                            <div class="text-sm text-white opacity-80">Devotions</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-white">50+</div>
                            <div class="text-sm text-white opacity-80">Writers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
