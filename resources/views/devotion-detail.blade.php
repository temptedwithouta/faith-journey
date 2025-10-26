<x-layout>
    <x-slot:title>
        Devotion Detail
    </x-slot>

    <!-- Breadcrumb -->
    {{-- <section class="bg-light py-4">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center text-sm text-gray-600">
                <a href="/" class="hover:text-secondary transition duration-300">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                <i class="fas fa-chevron-right mx-3 text-xs"></i>
                <a href="/blog" class="hover:text-secondary transition duration-300">Renungan</a>
                <i class="fas fa-chevron-right mx-3 text-xs"></i>
                <span class="text-primary">Menemukan Kedamaian di Tengah Badai...</span>
            </nav>
        </div>
    </section> --}}

    <!-- Article Header -->
    <section class="bg-white py-12">
        @if (isset($devotion))
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Category Badge -->
                {{-- <div class="mb-4">
                <span class="inline-block bg-secondary text-white px-4 py-1 rounded-full text-sm font-semibold">
                    <i class="fas fa-tag mr-2"></i>{{ $devotion->category_name }}
                </span>
            </div> --}}

                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-bold text-primary mb-6 leading-tight">
                    {{ $devotion->title }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-6 text-gray-600 mb-8">
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2 text-secondary"></i>
                        <span>{{ $devotion->created_at->format('d M Y') }}</span>
                    </div>
                    {{-- <div class="flex items-center">
                    <i class="fas fa-clock mr-2 text-secondary"></i>
                    <span>5 menit baca</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-eye mr-2 text-secondary"></i>
                    <span>1,234 views</span>
                </div> --}}
                </div>

                <!-- Author Info -->
                <div class="flex items-center justify-between border-t border-b border-gray-200 py-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-primary">{{ $devotion->author_name }}</p>
                            <p class="text-sm text-gray-500">Author</p>
                        </div>
                    </div>
                    {{-- <div class="flex items-center gap-3">
                    <button class="text-gray-400 hover:text-secondary transition duration-300">
                        <i class="fas fa-bookmark text-xl"></i>
                    </button>
                    <button class="text-gray-400 hover:text-secondary transition duration-300">
                        <i class="fas fa-share-alt text-xl"></i>
                    </button>
                </div> --}}
                </div>

                <!-- Featured Image -->
                <div class="bg-secondary rounded-lg h-96 flex items-center justify-center mb-12">
                    <i class="fas fa-dove text-9xl text-white"></i>
                </div>

                <!-- Verse Quote -->
                <div class="bg-light border-l-4 border-secondary p-6 rounded-r-lg mb-12">
                    <i class="fas fa-quote-left text-3xl text-secondary mb-4"></i>
                    <p class="text-xl text-gray-700 italic mb-4 leading-relaxed">
                        "Tinggallah dalam damai sejahtera-Ku. Damai sejahtera-Ku Kuberikan kepadamu, dan damai sejahtera
                        yang
                        Kuberikan tidak seperti yang diberikan oleh dunia kepadamu. Janganlah gelisah dan gentar
                        hatimu."
                    </p>
                    <cite class="text-secondary font-bold text-lg">- Yohanes 14:27</cite>
                </div>

                <!-- Article Content -->
                <article class="prose prose-lg max-w-none">
                    {{-- <h2 class="text-2xl font-bold text-primary mb-4 mt-8">Menghadapi Badai Kehidupan</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Hidup tidak selalu berjalan sesuai dengan rencana kita. Kadang kita mengalami masa-masa sulit yang
                    terasa seperti badai yang menghantam kapal kehidupan kita. Mungkin itu adalah masalah kesehatan,
                    keuangan, hubungan, atau tantangan lainnya yang membuat kita merasa kewalahan.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Dalam Injil Matius 8:23-27, kita membaca tentang murid-murid Yesus yang mengalami badai dahsyat di
                    danau. Mereka ketakutan, merasa hidupnya terancam. Namun, Yesus ada bersama mereka di perahu yang
                    sama.
                    Ketika mereka membangunkan Yesus dengan panik, Ia menenangkan badai dengan firman-Nya.
                </p>

                <h2 class="text-2xl font-bold text-primary mb-4 mt-8">Yesus Hadir dalam Badai Kita</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Kisah ini mengajarkan kita bahwa Yesus tidak meninggalkan kita sendirian dalam badai kehidupan. Dia
                    ada
                    bersama kita, bahkan ketika kita tidak merasakannya. Seperti murid-murid yang tidak menyadari
                    kehadiran
                    Yesus sampai mereka memanggilnya, kadang kita juga lupa bahwa Tuhan selalu dekat.
                </p>

                <div class="bg-accent bg-opacity-20 border-l-4 border-accent p-6 rounded-r-lg my-8">
                    <h3 class="text-xl font-bold text-primary mb-3">
                        <i class="fas fa-lightbulb mr-2 text-accent"></i>Refleksi
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Badai apa yang sedang Anda hadapi hari ini? Apakah Anda sudah mengundang Yesus untuk hadir dalam
                        situasi tersebut? Kadang kita terlalu sibuk mencari solusi sendiri hingga lupa berpaling kepada
                        Sang
                        Pemberi Solusi.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-primary mb-4 mt-8">Kedamaian yang Melampaui Akal</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Kedamaian yang Yesus tawarkan berbeda dengan kedamaian yang dunia berikan. Dunia memberikan
                    kedamaian
                    ketika segala sesuatu berjalan lancar. Tetapi kedamaian dari Kristus tetap ada bahkan di tengah
                    badai.
                    Ini adalah kedamaian yang melampaui akal budi kita (Filipi 4:7).
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Kedamaian ini bukan berarti tidak ada masalah, tetapi berarti kita memiliki keyakinan bahwa Tuhan
                    memegang kendali atas setiap situasi. Kita tahu bahwa Dia yang memulai pekerjaan baik dalam hidup
                    kita
                    akan menyelesaikannya (Filipi 1:6).
                </p>

                <h2 class="text-2xl font-bold text-primary mb-4 mt-8">Langkah Praktis Menemukan Kedamaian</h2>
                <div class="space-y-4 mb-6">
                    <div class="flex items-start">
                        <div
                            class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary mb-2">Bawa Segala Beban dalam Doa</h3>
                            <p class="text-gray-700">Jangan menyimpan kekhawatiran untuk diri sendiri. Bawalah semuanya
                                kepada Tuhan dalam doa dengan hati yang terbuka dan jujur.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary mb-2">Renungkan Firman Tuhan</h3>
                            <p class="text-gray-700">Firman Tuhan adalah pedang Roh yang dapat memotong kegelapan
                                kekhawatiran. Bacalah dan renungkan janji-janji Tuhan setiap hari.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary mb-2">Bersekutu dengan Saudara Seiman</h3>
                            <p class="text-gray-700">Jangan menghadapi badai sendirian. Bagikan pergumulan Anda dengan
                                saudara seiman yang dapat mendukung dan mendoakan Anda.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary mb-2">Ingat Kesetiaan Tuhan di Masa Lalu</h3>
                            <p class="text-gray-700">Kenangkan bagaimana Tuhan telah menolong Anda di masa lalu.
                                Kesetiaan-Nya yang sama akan menyertai Anda hari ini.</p>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-primary mb-4 mt-8">Penutup</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Badai kehidupan mungkin tidak segera berlalu, tetapi dengan Kristus kita memiliki jangkar harapan
                    yang
                    kokoh. Kedamaian-Nya yang sejati dapat kita alami bukan karena tidak ada masalah, tetapi karena kita
                    tahu siapa yang memegang kendali atas setiap situasi.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Saat ini, di tengah badai apa pun yang Anda hadapi, berpaling kepada Yesus. Panggilah nama-Nya.
                    Percayalah bahwa Dia mendengar dan Dia peduli. Dan rasakan kedamaian-Nya yang melampaui segala akal
                    budi
                    mulai mengisi hati Anda.
                </p> --}}
                    {!! $devotion->body !!}
                </article>

                <!-- Closing Prayer -->
                {{-- <div class="bg-primary text-white p-8 rounded-lg my-12">
                <h3 class="text-2xl font-bold mb-4 flex items-center">
                    <i class="fas fa-praying-hands mr-3"></i>Doa Penutup
                </h3>
                <p class="leading-relaxed italic">
                    Bapa yang terkasih, terima kasih karena Engkau tidak pernah meninggalkan kami sendirian dalam badai
                    kehidupan. Kami berseru kepada-Mu hari ini, mohon berikan kami kedamaian yang hanya dapat datang
                    dari-Mu. Kuatkan iman kami untuk percaya bahwa Engkau memegang kendali atas setiap situasi. Dalam
                    nama
                    Yesus Kristus, kami berdoa. Amin.
                </p>
            </div> --}}

                <!-- Tags -->
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-primary mb-4">Category:</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="#"
                            class="bg-gray-100 hover:bg-accent hover:text-white px-4 py-2 rounded-full text-sm transition duration-300">
                            <i class="fas fa-tag mr-1"></i>{{ $devotion->category_name }}
                        </a>
                        {{-- <a href="#"
                        class="bg-gray-100 hover:bg-accent hover:text-white px-4 py-2 rounded-full text-sm transition duration-300">
                        <i class="fas fa-tag mr-1"></i>Kedamaian
                    </a>
                    <a href="#"
                        class="bg-gray-100 hover:bg-accent hover:text-white px-4 py-2 rounded-full text-sm transition duration-300">
                        <i class="fas fa-tag mr-1"></i>Doa
                    </a>
                    <a href="#"
                        class="bg-gray-100 hover:bg-accent hover:text-white px-4 py-2 rounded-full text-sm transition duration-300">
                        <i class="fas fa-tag mr-1"></i>Pengharapan
                    </a> --}}
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="border-t border-b border-gray-200 py-6 mb-8">
                    <h3 class="text-lg font-bold text-primary mb-4">Share Devotion:</h3>
                    <div class="flex gap-3">
                        {{-- <a href="#"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-300 flex items-center">
                        <i class="fab fa-facebook-f mr-2"></i>Facebook
                    </a>
                    <a href="#"
                        class="bg-blue-400 hover:bg-blue-500 text-white px-6 py-3 rounded-lg transition duration-300 flex items-center">
                        <i class="fab fa-twitter mr-2"></i>Twitter
                    </a>
                    <a href="#"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition duration-300 flex items-center">
                        <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                    </a> --}}
                        <button @@click="copyToClipboard('{{ URL::full() }}')"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg transition duration-300 flex items-center">
                            <i class="fas fa-link mr-2"></i>Copy Link
                        </button>
                    </div>
                </div>

                <!-- Author Bio -->
                {{-- <div class="bg-light p-8 rounded-lg mb-12">
                <h3 class="text-xl font-bold text-primary mb-4">Tentang Penulis</h3>
                <div class="flex items-start gap-6">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-lg font-bold text-primary mb-2">Pastor John</h4>
                        <p class="text-gray-700 mb-4">
                            Pastor John telah melayani di bidang penggembalaan selama lebih dari 15 tahun. Ia memiliki
                            passion untuk membantu orang menemukan makna dan tujuan hidup melalui hubungan dengan
                            Kristus.
                            Melalui tulisan-tulisannya, ia berharap dapat menginspirasi banyak orang untuk bertumbuh
                            dalam
                            iman mereka.
                        </p>
                        <div class="flex gap-3">
                            <a href="#" class="text-secondary hover:text-primary transition duration-300">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-secondary hover:text-primary transition duration-300">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-secondary hover:text-primary transition duration-300">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-secondary hover:text-primary transition duration-300">
                                <i class="fas fa-envelope text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

                <!-- Comments Section -->
                {{-- <div class="mb-12">
                <h3 class="text-2xl font-bold text-primary mb-6">Komentar (12)</h3>

                <!-- Comment Form -->
                <div class="bg-white border border-gray-200 rounded-lg p-6 mb-8">
                    <h4 class="text-lg font-semibold text-primary mb-4">Tinggalkan Komentar</h4>
                    <form>
                        <div class="mb-4">
                            <textarea rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent"
                                placeholder="Bagikan pemikiran Anda..."></textarea>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <input type="text" placeholder="Nama"
                                class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent">
                            <input type="email" placeholder="Email"
                                class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent">
                        </div>
                        <button type="submit"
                            class="bg-secondary hover:bg-opacity-90 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Komentar
                        </button>
                    </form>
                </div>

                <!-- Comment List -->
                <div class="space-y-6">
                    <!-- Comment 1 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="font-bold text-primary">Maria Sari</h5>
                                    <span class="text-sm text-gray-500">2 hari yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Artikel yang sangat memberkati! Mengingatkan saya bahwa Tuhan selalu hadir di tengah
                                    pergumulan hidup. Terima kasih untuk renungan yang indah ini.
                                </p>
                                <button
                                    class="text-secondary hover:text-primary text-sm font-semibold transition duration-300">
                                    <i class="fas fa-reply mr-1"></i>Balas
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 2 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="font-bold text-primary">David Lim</h5>
                                    <span class="text-sm text-gray-500">3 hari yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Tepat sekali apa yang saya butuhkan hari ini. Sedang menghadapi masa sulit dan
                                    artikel
                                    ini memberikan penghiburan dan harapan baru. Tuhan memberkati!
                                </p>
                                <button
                                    class="text-secondary hover:text-primary text-sm font-semibold transition duration-300">
                                    <i class="fas fa-reply mr-1"></i>Balas
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 3 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="font-bold text-primary">Ruth Wijaya</h5>
                                    <span class="text-sm text-gray-500">5 hari yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Artikel yang luar biasa! Saya akan membagikan ini kepada teman-teman yang sedang
                                    bergumul. Kiranya Tuhan terus memakai tulisan-tulisan seperti ini untuk memberkati
                                    banyak orang.
                                </p>
                                <button
                                    class="text-secondary hover:text-primary text-sm font-semibold transition duration-300">
                                    <i class="fas fa-reply mr-1"></i>Balas
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button class="text-secondary hover:text-primary font-semibold transition duration-300">
                        Lihat Semua Komentar <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                </div>
            </div> --}}
            </div>
        @else
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
                <i class="fas fa-exclamation-triangle text-6xl text-gray-400
    mb-6"></i>
                <h2 class="text-3xl font-bold text-primary mb-4">
                    Devotion Not Found
                </h2>
                <p class="text-lg text-gray-500">
                    The devotion you are looking for does not exist or has been removed.
                </p>
        @endif
    </section>

    <!-- Related Devotions -->
    <section class="py-16 bg-light">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary mb-8 text-center">Related Devotions</h2>

            @if (isset($relatedDevotions))
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Related Post 1 -->
                    {{-- <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-accent h-48 flex items-center justify-center">
                        <i class="fas fa-praying-hands text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="text-secondary text-sm font-semibold mb-2">15 September 2024</div>
                        <h3 class="text-xl font-bold text-primary mb-3">Kekuatan Doa dalam Keseharian</h3>
                        <p class="text-gray-600 mb-4">
                            Bagaimana doa dapat menjadi sumber kekuatan dan kedamaian dalam menghadapi tantangan
                            hidup...
                        </p>
                        <a href="#"
                            class="text-secondary hover:text-primary font-semibold transition duration-300">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Related Post 2 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-primary h-48 flex items-center justify-center">
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

                <!-- Related Post 3 -->
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="bg-secondary h-48 flex items-center justify-center">
                        <i class="fas fa-bible text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <div class="text-secondary text-sm font-semibold mb-2">10 September 2024</div>
                        <h3 class="text-xl font-bold text-primary mb-3">Menemukan Hikmat dalam Firman</h3>
                        <p class="text-gray-600 mb-4">
                            Bagaimana Firman Tuhan dapat memberikan pencerahan dan bimbingan dalam setiap langkah
                            hidup...
                        </p>
                        <a href="#"
                            class="text-secondary hover:text-primary font-semibold transition duration-300">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article> --}}

                    @foreach ($relatedDevotions as $devotion)
                        <x-devotion-item :devotion="$devotion" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">No related devotions found.</p>
            @endif
        </div>

    </section>
</x-layout>
