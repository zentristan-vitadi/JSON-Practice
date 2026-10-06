<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Sholat - E-Quran</title>
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
        <header class="text-center max-w-2xl mx-auto mb-8 sm:mb-12 space-y-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-neutral-900 border border-neutral-800 rounded-full text-[11px] font-medium text-neutral-400 uppercase tracking-wider">
                <i class="fa-solid fa-location-dot text-amber-400/80 text-[10px]"></i>
                <span>{{ $jadwal['kabkota'] ?? 'Kota Bogor' }}, {{ $jadwal['provinsi'] ?? 'Jawa Barat' }}</span>
            </span>
            <h1 class="font-fraunces text-3xl sm:text-4xl md:text-5xl font-semibold text-white tracking-tight">
                Jadwal Waktu Sholat
            </h1>
            <p class="text-neutral-400 text-xs sm:text-sm leading-relaxed">
                Jadwal waktu sholat akurat untuk wilayah {{ $jadwal['kabkota'] ?? 'Kota Bogor' }} dan sekitarnya.
            </p>
        </header>

        <!-- Table Container -->
        <div class="bg-neutral-900/60 border border-neutral-800 rounded-3xl overflow-hidden shadow-2xl backdrop-blur-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm whitespace-nowrap">
                    <thead class="bg-neutral-950/80 border-b border-neutral-800 text-neutral-400 uppercase text-[11px] font-semibold tracking-wider font-poppins">
                        <tr>
                            <th class="py-4 px-4 sm:px-6">Tanggal</th>
                            <th class="py-4 px-3 sm:px-4">Hari</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Imsak</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Subuh</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Terbit</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Dzuhur</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Ashar</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Maghrib</th>
                            <th class="py-4 px-3 sm:px-4 text-center">Isya</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-800/60 font-light">
                        @foreach ($jadwal['jadwal'] as $hari)
                        <tr class="jadwal-row hover:bg-neutral-800/40 transition-colors">
                            <td class="py-3.5 px-4 sm:px-6 font-medium text-neutral-200">{{ $hari['tanggal_lengkap'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-neutral-400">{{ $hari['hari'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-300 font-mono text-xs sm:text-sm">{{ $hari['imsak'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-200 font-medium font-mono text-xs sm:text-sm">{{ $hari['subuh'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-400 font-mono text-xs sm:text-sm">{{ $hari['terbit'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-200 font-medium font-mono text-xs sm:text-sm">{{ $hari['dzuhur'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-200 font-medium font-mono text-xs sm:text-sm">{{ $hari['ashar'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-200 font-medium font-mono text-xs sm:text-sm">{{ $hari['maghrib'] }}</td>
                            <td class="py-3.5 px-3 sm:px-4 text-center text-neutral-200 font-medium font-mono text-xs sm:text-sm">{{ $hari['isya'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Controls -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8 pt-6 border-t border-neutral-800/80">
            <p class="text-xs text-neutral-400">
                Menampilkan <span id="pageStart" class="text-neutral-200 font-medium">1</span> - <span id="pageEnd" class="text-neutral-200 font-medium">10</span> dari <span id="totalItems" class="text-neutral-200 font-medium">{{ count($jadwal['jadwal']) }}</span> Hari
            </p>
            <div id="paginationControls" class="flex items-center gap-1.5 flex-wrap justify-center"></div>
        </div>
    </main>

    <!-- Table Pagination Script -->
    <script>
        const allRows = Array.from(document.querySelectorAll('.jadwal-row'));
        const paginationControls = document.getElementById('paginationControls');
        const pageStart = document.getElementById('pageStart');
        const pageEnd = document.getElementById('pageEnd');
        const totalItemsEl = document.getElementById('totalItems');

        const itemsPerPage = 10;
        let currentPage = 1;

        function render() {
            const total = allRows.length;
            const totalPages = Math.ceil(total / itemsPerPage) || 1;

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIdx = (currentPage - 1) * itemsPerPage;
            const endIdx = startIdx + itemsPerPage;

            allRows.forEach((row, i) => {
                row.style.display = (i >= startIdx && i < endIdx) ? 'table-row' : 'none';
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
            prevBtn.onclick = () => { if (currentPage > 1) { currentPage--; render(); } };
            paginationControls.appendChild(prevBtn);

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.className = `w-8 h-8 rounded-xl flex items-center justify-center text-xs font-medium transition-colors ${
                    i === currentPage
                    ? 'bg-neutral-800 text-white border border-neutral-700 font-semibold'
                    : 'bg-neutral-900 border border-neutral-800 text-neutral-400 hover:text-white hover:border-neutral-700'
                }`;
                btn.onclick = () => {
                    currentPage = i;
                    render();
                };
                paginationControls.appendChild(btn);
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
            nextBtn.onclick = () => { if (currentPage < totalPages) { currentPage++; render(); } };
            paginationControls.appendChild(nextBtn);
        }

        render();
    </script>
</body>

</html>
