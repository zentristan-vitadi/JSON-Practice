<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote of the Day - E-Quran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..700&family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ef1f748698.js" crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        fraunces: ['Fraunces', 'serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-black text-white min-h-screen flex flex-col font-poppins selection:bg-white selection:text-black antialiased">
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

    <div class="flex-1 flex items-center justify-center p-6 sm:p-12">
        <main class="max-w-4xl w-full text-center space-y-8">
            <blockquote class="font-fraunces text-3xl sm:text-5xl md:text-6xl font-light leading-snug tracking-tight text-neutral-100">
                “{{ $singleQuotes['quote'] }}”
            </blockquote>
            <p class="font-poppins text-xs sm:text-sm md:text-base text-neutral-400 font-normal tracking-widest uppercase">
                — {{ $singleQuotes['author'] }}
            </p>
        </main>
    </div>
</body>

</html>
