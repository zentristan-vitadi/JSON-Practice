<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $doa['nama'] ?? 'Detail Doa' }} - E-Quran</title>
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

    <!-- Main Container -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 pt-6 sm:pt-8 space-y-6">
        <!-- Back Link -->
        <div>
            <a href="{{ route('doa.index') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm text-neutral-400 hover:text-white transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Kumpulan Doa</span>
            </a>
        </div>

        <!-- Detail Card -->
        <article class="bg-neutral-900/60 border border-neutral-800 rounded-3xl p-6 sm:p-8 space-y-6">
            <!-- Header -->
            <div class="text-center space-y-2 pb-4 border-b border-neutral-800/80">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-neutral-950 border border-neutral-800 rounded-full text-[11px] font-medium text-neutral-400 uppercase tracking-wider">
                    <i class="fa-solid fa-hands-praying text-amber-400/80 text-[10px]"></i>
                    <span>Doa Harian</span>
                </div>
                <h1 class="font-fraunces text-2xl sm:text-3xl md:text-4xl font-semibold text-white tracking-tight pt-1">
                    {{ $doa['nama'] }}
                </h1>
            </div>

            <!-- Arabic Text -->
            @if (!empty($doa['ar']))
            <div class="py-6 text-right">
                <p class="font-amiri text-2xl sm:text-3xl md:text-4xl text-neutral-100 font-normal leading-[2.3] sm:leading-[2.5] tracking-wide select-text">
                    {{ $doa['ar'] }}
                </p>
            </div>
            @endif

            <!-- Latin Transliteration -->
            @if (!empty($doa['tr']))
            <div class="space-y-1.5 pt-2 border-t border-neutral-800/50">
                <p class="text-[11px] uppercase tracking-wider text-neutral-500 font-medium">Pelafalan (Latin)</p>
                <p class="font-poppins text-xs sm:text-sm text-neutral-300 font-light italic leading-relaxed">
                    {{ $doa['tr'] }}
                </p>
            </div>
            @endif

            <!-- Meaning / Translation -->
            @if (!empty($doa['idn']))
            <div class="space-y-1.5 pt-2 border-t border-neutral-800/50">
                <p class="text-[11px] uppercase tracking-wider text-neutral-500 font-medium">Artinya</p>
                <p class="font-poppins text-xs sm:text-sm text-neutral-200 font-normal leading-relaxed">
                    "{{ $doa['idn'] }}"
                </p>
            </div>
            @endif
        </article>
    </main>
</body>

</html>
