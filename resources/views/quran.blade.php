<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Qur'an Digital - E-Quran</title>
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
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
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

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <!-- Header -->
        <header class="text-center max-w-2xl mx-auto mb-8 sm:mb-12">
            <h1 class="font-fraunces text-3xl sm:text-4xl md:text-5xl font-semibold text-white tracking-tight">
                Al-Qur'an Al-Karim
            </h1>
            <p class="text-neutral-400 text-xs sm:text-sm mt-3 leading-relaxed">
                Baca dan pelajari 114 surah dengan terjemahan bahasa Indonesia dan audio murottal.
            </p>

            <!-- Search Input -->
            <div class="relative mt-6 max-w-md mx-auto">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 text-sm"></i>
                <input
                    type="text"
                    id="searchSurah"
                    placeholder="Cari nama surah atau nomor..."
                    class="w-full bg-neutral-900 border border-neutral-800 rounded-xl py-2.5 pl-11 pr-4 text-sm text-neutral-200 placeholder-neutral-500 focus:outline-none focus:border-neutral-600 focus:ring-1 focus:ring-neutral-600 transition-all">
            </div>
        </header>

        <!-- Surah Grid -->
        <div id="surahContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5 sm:gap-4">
            @foreach ($quran as $surat)
            <a
                href="{{ route('quran.show', $surat['nomor']) }}"
                data-name="{{ strtolower($surat['namaLatin']) }}"
                data-number="{{ $surat['nomor'] }}"
                data-meaning="{{ strtolower($surat['arti'] ?? '') }}"
                class="surah-card group bg-neutral-900/60 hover:bg-neutral-900 border border-neutral-800/80 hover:border-neutral-700 rounded-2xl p-4 sm:p-5 transition-all duration-200 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-neutral-950 border border-neutral-800 flex items-center justify-center font-fraunces text-sm font-medium text-neutral-400 group-hover:text-white group-hover:border-neutral-700 transition-colors shrink-0">
                        {{ $surat['nomor'] }}
                    </div>
                    <div class="truncate">
                        <h2 class="font-fraunces font-semibold text-base text-neutral-200 group-hover:text-white transition-colors truncate">
                            {{ $surat['namaLatin'] }}
                        </h2>
                        <p class="text-[11px] sm:text-xs text-neutral-400 font-light truncate mt-0.5">
                            {{ $surat['arti'] ?? '' }} • <span class="capitalize">{{ $surat['tempatTurun'] }}</span> • {{ $surat['jumlahAyat'] }} Ayat
                        </p>
                    </div>
                </div>
                <div class="text-right shrink-0">
                    <span class="font-amiri text-xl sm:text-2xl text-neutral-300 group-hover:text-white transition-colors leading-none block">
                        {{ $surat['nama'] }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination Controls -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-10 pt-6 border-t border-neutral-800/80">
            <p class="text-xs text-neutral-400">
                Menampilkan <span id="pageStart" class="text-neutral-200 font-medium">1</span> - <span id="pageEnd" class="text-neutral-200 font-medium">12</span> dari <span id="totalItems" class="text-neutral-200 font-medium">114</span> Surah
            </p>
            <div id="paginationControls" class="flex items-center gap-1.5 flex-wrap justify-center"></div>
        </div>
    </main>

    <!-- Pagination & Search Script -->
    <script>
        const searchInput = document.getElementById('searchSurah');
        const allCards = Array.from(document.querySelectorAll('.surah-card'));
        const paginationControls = document.getElementById('paginationControls');
        const pageStart = document.getElementById('pageStart');
        const pageEnd = document.getElementById('pageEnd');
        const totalItemsEl = document.getElementById('totalItems');

        const itemsPerPage = 12;
        let currentPage = 1;
        let filteredCards = [...allCards];

        function render() {
            const total = filteredCards.length;
            const totalPages = Math.ceil(total / itemsPerPage) || 1;

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIdx = (currentPage - 1) * itemsPerPage;
            const endIdx = startIdx + itemsPerPage;

            allCards.forEach(card => card.style.display = 'none');
            filteredCards.slice(startIdx, endIdx).forEach(card => {
                card.style.display = 'flex';
            });

            pageStart.textContent = total === 0 ? 0 : startIdx + 1;
            pageEnd.textContent = Math.min(endIdx, total);
            totalItemsEl.textContent = total;

            renderPaginationButtons(totalPages);
        }

        function renderPaginationButtons(totalPages) {
            paginationControls.innerHTML = '';
            if (totalPages <= 1) return;

            // Prev Button
            const prevBtn = document.createElement('button');
            prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left text-[10px]"></i>';
            prevBtn.className = `w-8 h-8 rounded-xl flex items-center justify-center text-xs transition-colors ${
                currentPage === 1 
                ? 'bg-neutral-900/50 border border-neutral-800 text-neutral-600 cursor-not-allowed' 
                : 'bg-neutral-900 border border-neutral-800 text-neutral-300 hover:text-white hover:border-neutral-700'
            }`;
            prevBtn.disabled = currentPage === 1;
            prevBtn.onclick = () => { if (currentPage > 1) { currentPage--; render(); window.scrollTo({ top: 0, behavior: 'smooth' }); } };
            paginationControls.appendChild(prevBtn);

            // Page numbers
            const maxVisible = 5;
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, startPage + maxVisible - 1);

            if (endPage - startPage < maxVisible - 1) {
                startPage = Math.max(1, endPage - maxVisible + 1);
            }

            if (startPage > 1) {
                createPageButton(1);
                if (startPage > 2) createEllipsis();
            }

            for (let i = startPage; i <= endPage; i++) {
                createPageButton(i);
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) createEllipsis();
                createPageButton(totalPages);
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
            nextBtn.onclick = () => { if (currentPage < totalPages) { currentPage++; render(); window.scrollTo({ top: 0, behavior: 'smooth' }); } };
            paginationControls.appendChild(nextBtn);
        }

        function createPageButton(page) {
            const btn = document.createElement('button');
            btn.textContent = page;
            btn.className = `w-8 h-8 rounded-xl flex items-center justify-center text-xs font-medium transition-colors ${
                page === currentPage
                ? 'bg-neutral-800 text-white border border-neutral-700 font-semibold'
                : 'bg-neutral-900 border border-neutral-800 text-neutral-400 hover:text-white hover:border-neutral-700'
            }`;
            btn.onclick = () => {
                currentPage = page;
                render();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            };
            paginationControls.appendChild(btn);
        }

        function createEllipsis() {
            const span = document.createElement('span');
            span.textContent = '...';
            span.className = 'px-1 text-neutral-500 text-xs';
            paginationControls.appendChild(span);
        }

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            filteredCards = allCards.filter(card => {
                const name = card.getAttribute('data-name');
                const number = card.getAttribute('data-number');
                const meaning = card.getAttribute('data-meaning');
                return name.includes(query) || number.includes(query) || meaning.includes(query);
            });
            currentPage = 1;
            render();
        });

        render();
    </script>
</body>

</html>
