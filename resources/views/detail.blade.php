<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surah {{ $quran['namaLatin'] }} ({{ $quran['nama'] }}) - E-Quran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ef1f748698.js" crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        fraunces: ['Fraunces', 'serif'],
                        poppins: ['Poppins', 'sans-serif'],
                        amiri: ['Amiri', 'serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-neutral-950 text-neutral-100 font-poppins antialiased selection:bg-neutral-800 selection:text-white pb-16">
    <!-- Navbar -->
    <nav class="sticky top-0 z-40 bg-neutral-950/80 backdrop-blur-md border-b border-neutral-800/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
            <a href="{{ route('quran.index') }}" class="flex items-center gap-2.5 group">
                <div class="w-9 h-9 rounded-xl bg-neutral-900 border border-neutral-800 flex items-center justify-center text-neutral-300 group-hover:text-amber-300 group-hover:border-neutral-700 transition-colors">
                    <i class="fa-solid fa-moon text-sm"></i>
                </div>
                <span class="font-fraunces font-semibold text-base sm:text-lg text-white tracking-tight">E-Quran</span>
            </a>

            <div class="flex items-center gap-1 sm:gap-2">
                <a href="{{ route('quran.index') }}" class="px-3 sm:px-4 py-1.5 rounded-xl text-xs sm:text-sm font-medium transition-colors flex items-center gap-2 {{ request()->routeIs('quran.*') ? 'bg-neutral-800 text-white border border-neutral-700' : 'text-neutral-400 hover:text-white hover:bg-neutral-900' }}">
                    <i class="fa-solid fa-book-quran text-xs"></i>
                    <span class="hidden sm:inline">Al-Qur'an</span>
                </a>
                <a href="{{ route('doa.index') }}" class="px-3 sm:px-4 py-1.5 rounded-xl text-xs sm:text-sm font-medium transition-colors flex items-center gap-2 {{ request()->routeIs('doa.*') ? 'bg-neutral-800 text-white border border-neutral-700' : 'text-neutral-400 hover:text-white hover:bg-neutral-900' }}">
                    <i class="fa-solid fa-hands-praying text-xs"></i>
                    <span class="hidden sm:inline">Doa Harian</span>
                </a>
                <a href="{{ route('jadwal.index') }}" class="px-3 sm:px-4 py-1.5 rounded-xl text-xs sm:text-sm font-medium transition-colors flex items-center gap-2 {{ request()->routeIs('jadwal.*') ? 'bg-neutral-800 text-white border border-neutral-700' : 'text-neutral-400 hover:text-white hover:bg-neutral-900' }}">
                    <i class="fa-solid fa-clock text-xs"></i>
                    <span class="hidden sm:inline">Jadwal Sholat</span>
                </a>
                <a href="{{ url('/') }}" class="px-3 sm:px-4 py-1.5 rounded-xl text-xs sm:text-sm font-medium transition-colors flex items-center gap-2 {{ (request()->is('/') || request()->routeIs('qoutes.*')) ? 'bg-neutral-800 text-white border border-neutral-700' : 'text-neutral-400 hover:text-white hover:bg-neutral-900' }}">
                    <i class="fa-solid fa-quote-left text-xs"></i>
                    <span class="hidden sm:inline">Quotes</span>
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 pt-6 sm:pt-8 space-y-6 sm:space-y-8">
        <!-- Back Link -->
        <div>
            <a href="{{ route('quran.index') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm text-neutral-400 hover:text-white transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Daftar Surah</span>
            </a>
        </div>

        <!-- Surah Info Card -->
        <section class="bg-neutral-900/60 border border-neutral-800 rounded-3xl p-6 sm:p-8 text-center space-y-5">
            <div class="space-y-2">
                <span class="inline-block px-3 py-1 bg-neutral-950 border border-neutral-800 rounded-full text-[11px] font-medium text-neutral-400 uppercase tracking-wider">
                    Surah Ke-{{ $quran['nomor'] }} • {{ $quran['tempatTurun'] }} • {{ $quran['jumlahAyat'] }} Ayat
                </span>
                <h1 class="font-fraunces text-3xl sm:text-4xl md:text-5xl font-semibold text-white tracking-tight pt-1">
                    {{ $quran['namaLatin'] }}
                </h1>
                <p class="font-amiri text-2xl sm:text-3xl text-neutral-300 leading-none pt-1">
                    {{ $quran['nama'] }}
                </p>
                <p class="text-xs sm:text-sm text-neutral-400 font-light">
                    "{{ $quran['arti'] ?? '' }}"
                </p>
            </div>

            <!-- Full Audio -->
            @php
                $audioUrl = $quran['audioFull']['06'] ?? $quran['audioFull']['05'] ?? $quran['audioFull']['01'] ?? (is_array($quran['audioFull']) ? reset($quran['audioFull']) : null);
            @endphp
            @if ($audioUrl)
            <div class="pt-2 max-w-sm mx-auto">
                <p class="text-[11px] text-neutral-400 uppercase tracking-wider font-medium mb-1.5">Murottal Full Surah</p>
                <audio src="{{ $audioUrl }}" controls class="w-full h-9 rounded-lg opacity-90"></audio>
            </div>
            @endif

            <!-- Description Accordion / Detail -->
            @if (!empty($quran['deskripsi']))
            <details class="group text-left border-t border-neutral-800/80 pt-4 text-xs sm:text-sm text-neutral-400">
                <summary class="cursor-pointer font-medium text-neutral-300 hover:text-white flex items-center justify-between py-1 transition-colors select-none">
                    <span>Tentang Surah {{ $quran['namaLatin'] }}</span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                </summary>
                <div class="mt-3 leading-relaxed space-y-2 text-neutral-300 font-light text-justify">
                    {!! $quran['deskripsi'] !!}
                </div>
            </details>
            @endif
        </section>

        <!-- Bismillah Header for Surahs other than Al-Fatihah and At-Taubah -->
        @if ($quran['nomor'] != 1 && $quran['nomor'] != 9)
        <div class="text-center py-4 sm:py-6">
            <p class="font-amiri text-2xl sm:text-3xl text-neutral-200 tracking-wide">
                بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
            </p>
        </div>
        @endif

        <!-- Ayat List -->
        <section id="ayatSection" class="space-y-4 sm:space-y-6">
            @foreach ($quran['ayat'] as $ayat)
            <article class="ayat-card bg-neutral-900/50 hover:bg-neutral-900/80 border border-neutral-800/80 hover:border-neutral-700/80 rounded-2xl p-5 sm:p-7 transition-colors">
                <!-- Ayat Top Action / Number -->
                <div class="flex items-center justify-between gap-3 pb-3 border-b border-neutral-800/50">
                    <div class="px-2.5 py-1 rounded-lg bg-neutral-950 border border-neutral-800 text-neutral-400 font-fraunces text-xs font-medium">
                        {{ $quran['nomor'] }}:{{ $ayat['nomorAyat'] }}
                    </div>

                    @php
                        $ayatAudio = $ayat['audio']['02'] ?? $ayat['audio']['05'] ?? $ayat['audio']['01'] ?? (is_array($ayat['audio']) ? reset($ayat['audio']) : null);
                    @endphp
                    @if ($ayatAudio)
                    <div class="flex items-center">
                        <audio src="{{ $ayatAudio }}" controls class="h-7 w-36 sm:w-44 opacity-80"></audio>
                    </div>
                    @endif
                </div>

                <!-- Arabic Text -->
                <div class="py-5 text-right">
                    <p class="font-amiri text-2xl sm:text-3xl md:text-4xl text-neutral-100 font-normal leading-[2.3] sm:leading-[2.5] tracking-wide select-text">
                        {{ $ayat['teksArab'] }}
                    </p>
                </div>

                <!-- Transliteration (Latin) -->
                @if (!empty($ayat['teksLatin']))
                <p class="text-xs sm:text-sm text-neutral-400 font-light italic leading-relaxed pt-2">
                    {{ $ayat['teksLatin'] }}
                </p>
                @endif

                <!-- Indonesian Translation -->
                <p class="text-xs sm:text-sm text-neutral-200 font-normal leading-relaxed pt-1.5">
                    {{ $ayat['teksIndonesia'] }}
                </p>
            </article>
            @endforeach
        </section>

        <!-- Ayat Pagination Controls -->
        <div id="ayatPaginationWrap" class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-neutral-800/80">
            <p class="text-xs text-neutral-400">
                Menampilkan Ayat <span id="ayatPageStart" class="text-neutral-200 font-medium">1</span> - <span id="ayatPageEnd" class="text-neutral-200 font-medium">{{ min(15, count($quran['ayat'])) }}</span> dari <span class="text-neutral-200 font-medium">{{ count($quran['ayat']) }}</span>
            </p>
            <div id="ayatPaginationControls" class="flex items-center gap-1.5 flex-wrap justify-center"></div>
        </div>

        <!-- Previous & Next Surah Navigation -->
        <nav class="pt-6 grid grid-cols-2 gap-3 sm:gap-4 border-t border-neutral-800">
            <div>
                @if (!empty($quran['suratSebelumnya']) && is_array($quran['suratSebelumnya']))
                <a href="{{ route('quran.show', $quran['suratSebelumnya']['nomor']) }}" class="group flex items-center gap-3 p-3.5 sm:p-4 bg-neutral-900/60 hover:bg-neutral-900 border border-neutral-800 hover:border-neutral-700 rounded-2xl transition-all">
                    <i class="fa-solid fa-arrow-left text-neutral-400 group-hover:text-white transition-colors text-xs sm:text-sm"></i>
                    <div class="min-w-0">
                        <p class="text-[10px] sm:text-xs text-neutral-400 uppercase tracking-wider">Sebelumnya</p>
                        <p class="font-fraunces font-semibold text-xs sm:text-sm text-neutral-200 group-hover:text-white truncate mt-0.5">
                            {{ $quran['suratSebelumnya']['namaLatin'] }}
                        </p>
                    </div>
                </a>
                @endif
            </div>

            <div class="text-right">
                @if (!empty($quran['suratSelanjutnya']) && is_array($quran['suratSelanjutnya']))
                <a href="{{ route('quran.show', $quran['suratSelanjutnya']['nomor']) }}" class="group flex items-center justify-end gap-3 p-3.5 sm:p-4 bg-neutral-900/60 hover:bg-neutral-900 border border-neutral-800 hover:border-neutral-700 rounded-2xl transition-all">
                    <div class="min-w-0 text-right">
                        <p class="text-[10px] sm:text-xs text-neutral-400 uppercase tracking-wider">Selanjutnya</p>
                        <p class="font-fraunces font-semibold text-xs sm:text-sm text-neutral-200 group-hover:text-white truncate mt-0.5">
                            {{ $quran['suratSelanjutnya']['namaLatin'] }}
                        </p>
                    </div>
                    <i class="fa-solid fa-arrow-right text-neutral-400 group-hover:text-white transition-colors text-xs sm:text-sm"></i>
                </a>
                @endif
            </div>
        </nav>
    </main>

    <!-- Ayat Pagination Script -->
    <script>
        const allAyat = Array.from(document.querySelectorAll('.ayat-card'));
        const paginationWrap = document.getElementById('ayatPaginationWrap');
        const paginationControls = document.getElementById('ayatPaginationControls');
        const pageStartEl = document.getElementById('ayatPageStart');
        const pageEndEl = document.getElementById('ayatPageEnd');
        const ayatSection = document.getElementById('ayatSection');

        const itemsPerPage = 15;
        let currentPage = 1;

        function renderAyat() {
            const total = allAyat.length;
            if (total <= itemsPerPage) {
                paginationWrap.style.display = 'none';
                return;
            }

            const totalPages = Math.ceil(total / itemsPerPage);
            const startIdx = (currentPage - 1) * itemsPerPage;
            const endIdx = startIdx + itemsPerPage;

            allAyat.forEach((card, idx) => {
                card.style.display = (idx >= startIdx && idx < endIdx) ? 'block' : 'none';
            });

            pageStartEl.textContent = startIdx + 1;
            pageEndEl.textContent = Math.min(endIdx, total);

            renderButtons(totalPages);
        }

        function renderButtons(totalPages) {
            paginationControls.innerHTML = '';

            // Prev Button
            const prevBtn = document.createElement('button');
            prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left text-[10px]"></i>';
            prevBtn.className = `w-8 h-8 rounded-xl flex items-center justify-center text-xs transition-colors ${
                currentPage === 1 
                ? 'bg-neutral-900/50 border border-neutral-800 text-neutral-600 cursor-not-allowed' 
                : 'bg-neutral-900 border border-neutral-800 text-neutral-300 hover:text-white hover:border-neutral-700'
            }`;
            prevBtn.disabled = currentPage === 1;
            prevBtn.onclick = () => { if (currentPage > 1) { currentPage--; renderAyat(); ayatSection.scrollIntoView({ behavior: 'smooth' }); } };
            paginationControls.appendChild(prevBtn);

            const maxVisible = 5;
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, startPage + maxVisible - 1);

            if (endPage - startPage < maxVisible - 1) {
                startPage = Math.max(1, endPage - maxVisible + 1);
            }

            if (startPage > 1) {
                createBtn(1);
                if (startPage > 2) createEllipsis();
            }

            for (let i = startPage; i <= endPage; i++) {
                createBtn(i);
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) createEllipsis();
                createBtn(totalPages);
            }

            // Next Button
            const nextBtn = document.createElement('button');
            nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right text-[10px]"></i>';
            nextBtn.className = `w-8 h-8 rounded-xl flex items-center justify-center text-xs transition-colors ${
                currentPage === totalPages 
                ? 'bg-neutral-900/50 border border-neutral-800 text-neutral-600 cursor-not-allowed' 
                : 'bg-neutral-900 border border-neutral-800 text-neutral-300 hover:text-white hover:border-neutral-700'
            }`;
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.onclick = () => { if (currentPage < totalPages) { currentPage++; renderAyat(); ayatSection.scrollIntoView({ behavior: 'smooth' }); } };
            paginationControls.appendChild(nextBtn);
        }

        function createBtn(page) {
            const btn = document.createElement('button');
            btn.textContent = page;
            btn.className = `w-8 h-8 rounded-xl flex items-center justify-center text-xs font-medium transition-colors ${
                page === currentPage
                ? 'bg-neutral-800 text-white border border-neutral-700 font-semibold'
                : 'bg-neutral-900 border border-neutral-800 text-neutral-400 hover:text-white hover:border-neutral-700'
            }`;
            btn.onclick = () => {
                currentPage = page;
                renderAyat();
                ayatSection.scrollIntoView({ behavior: 'smooth' });
            };
            paginationControls.appendChild(btn);
        }

        function createEllipsis() {
            const span = document.createElement('span');
            span.textContent = '...';
            span.className = 'px-1 text-neutral-500 text-xs';
            paginationControls.appendChild(span);
        }

        renderAyat();
    </script>
</body>

</html>
