@if ($paginator->hasPages())
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <nav class="flex space-x-2" x-data="{ fetchPage(url) { const currentUrlParams = new URLSearchParams(window.location.search); const urlParams = new URL(url).searchParams; if (url.length <= 0 || currentUrlParams.get('page') == urlParams.get('page')) { return } else { window.location.href = url } } }">
                    <button @class([
                        'px-4 py-2 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50',
                        'disabled' => $paginator->onFirstPage(),
                    ])
                        @@click="fetchPage('{{ $paginator->previousPageUrl() }}')">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    @php
                        $counter = 0;

                        $isPrint = true;
                    @endphp

                    @for ($i = 0; $i < $paginator->lastPage(); $i++)
                        {{-- Kalau jumlah halaman lebih kecil sama dengan 5 maka tampilin semua halaman --}}
                        @if ($paginator->lastPage() <= 5)
                            <button @class([
                                'px-4 py-2 rounded-lg hover:bg-gray-50',
                                'bg-secondary text-white' => $paginator->currentPage() == $i + 1,
                                'border border-gray-300 text-gray-700' =>
                                    $paginator->currentPage() != $i + 1,
                            ])
                                @@click="fetchPage('{{ $paginator->url($i + 1) }}')">{{ $i + 1 }}</button>
                        @else
                            {{-- Kalau dari halaman saat ini ke halaman akhir tinggal sisa 5 atau kurang --}}
                            @if ($paginator->lastPage() - $paginator->currentPage() <= 4)
                                {{-- Halaman yang ditampilin hanya 5 halaman terakhir  --}}
                                @if ($paginator->lastPage() - ($i + 1) <= 4)
                                    <button @class([
                                        'px-4 py-2 rounded-lg hover:bg-gray-50',
                                        'bg-secondary text-white' => $paginator->currentPage() == $i + 1,
                                        'border border-gray-300 text-gray-700' =>
                                            $paginator->currentPage() != $i + 1,
                                    ])
                                        @@click="fetchPage('{{ $paginator->url($i + 1) }}')">{{ $i + 1 }}</button>
                                @endif
                            @else
                                {{-- Kalau halaman saat ini ada di posisi awal pagination --}}
                                @if (($paginator->lastPage() - $paginator->currentPage()) % 3 == 0 && $counter == 0 && $isPrint)
                                    {{-- Kalau halaman saat ini sama dengan posisi i maka tampilin posisi i --}}
                                    @if ($i + 1 == $paginator->currentPage())
                                        <button @class([
                                            'px-4 py-2 rounded-lg hover:bg-gray-50',
                                            'bg-secondary text-white' => $paginator->currentPage() == $i + 1,
                                            'border border-gray-300 text-gray-700' =>
                                                $paginator->currentPage() != $i + 1,
                                        ])
                                            @@click="fetchPage('{{ $paginator->url($i + 1) }}')">{{ $i + 1 }}</button>

                                        @php
                                            $counter++;

                                            $isPrint = false;
                                        @endphp
                                    @endif
                                    {{-- Kalau posisi i saat ini ada di posisi selain posisi awal pagination  --}}
                                @elseif (($paginator->lastPage() - ($i + 1)) % 3 == 0 && $counter == 0 && $isPrint)
                                    @if ($paginator->currentPage() - ($i + 1) == 1 || $paginator->currentPage() - ($i + 1) == 2)
                                        <button @class([
                                            'px-4 py-2 rounded-lg hover:bg-gray-50',
                                            'bg-secondary text-white' => $paginator->currentPage() == $i + 1,
                                            'border border-gray-300 text-gray-700' =>
                                                $paginator->currentPage() != $i + 1,
                                        ])
                                            @@click="fetchPage('{{ $paginator->url($i + 1) }}')">{{ $i + 1 }}</button>

                                        @php
                                            $counter++;

                                            $isPrint = false;
                                        @endphp
                                    @endif
                                @elseif ($counter > 0 && $counter < 3)
                                    <button @class([
                                        'px-4 py-2 rounded-lg hover:bg-gray-50',
                                        'bg-secondary text-white' => $paginator->currentPage() == $i + 1,
                                        'border border-gray-300 text-gray-700' =>
                                            $paginator->currentPage() != $i + 1,
                                    ])
                                        @@click="fetchPage('{{ $paginator->url($i + 1) }}')">{{ $i + 1 }}</button>

                                    @php
                                        $counter++;
                                    @endphp
                                @elseif($counter == 3)
                                    <span class="px-4 py-2 text-gray-500">...</span>

                                    @php
                                        $counter = 0;
                                    @endphp
                                @elseif ($i + 1 == $paginator->lastPage())
                                    <button @class([
                                        'px-4 py-2 rounded-lg hover:bg-gray-50',
                                        'bg-secondary text-white' => $paginator->currentPage() == $i + 1,
                                        'border border-gray-300 text-gray-700' =>
                                            $paginator->currentPage() != $i + 1,
                                    ])
                                        @@click="fetchPage('{{ $paginator->url($i + 1) }}')">{{ $i + 1 }}</button>
                                @endif
                            @endif
                        @endif
                    @endfor
                    {{-- <button class="px-4 py-2 bg-secondary text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">2</button>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">3</button>
                    <span class="px-4 py-2 text-gray-500">...</span>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">10</button> --}}
                    <button @class([
                        'px-4 py-2 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50',
                        'disabled' => $paginator->onLastPage(),
                    ])
                        @@click="fetchPage('{{ $paginator->nextPageUrl() }}')">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </div>
    </section>
@endif
