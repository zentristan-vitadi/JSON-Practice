<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $singleRecipe['name'] ?? 'Recipe Details' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap" rel="stylesheet">
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

<body class="min-h-screen bg-neutral-900 text-neutral-100 font-poppins flex items-center justify-center p-4 sm:p-8 antialiased selection:bg-neutral-700 selection:text-white">
    <main class="w-full max-w-lg bg-neutral-800/60 border border-neutral-700/60 rounded-2xl p-6 sm:p-8 shadow-2xl backdrop-blur-sm space-y-6">
        <div class="overflow-hidden rounded-xl aspect-[4/3] w-full bg-neutral-800 shadow-md">
            <img
                src="{{ $singleRecipe['image'] }}"
                alt="{{ $singleRecipe['name'] }}"
                class="w-full h-full object-cover">
        </div>

        <div class="space-y-3">
            <h1 class="font-fraunces text-2xl sm:text-3xl font-semibold text-white tracking-tight">
                {{ $singleRecipe['name'] }}
            </h1>

            <div class="grid grid-cols-3 gap-3 pt-1">
                <div class="bg-neutral-900/70 border border-neutral-700/40 rounded-xl p-3 text-center">
                    <p class="text-[11px] text-neutral-400 uppercase tracking-wider font-medium">Rating</p>
                    <p class="font-bold text-sm sm:text-base text-white mt-0.5 flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-star text-amber-400 text-xs"></i>
                        <span>{{ $singleRecipe['rating'] }}</span>
                    </p>
                </div>
                <div class="bg-neutral-900/70 border border-neutral-700/40 rounded-xl p-3 text-center">
                    <p class="text-[11px] text-neutral-400 uppercase tracking-wider font-medium">Difficulty</p>
                    <p class="font-bold text-sm sm:text-base text-white mt-0.5">{{ $singleRecipe['difficulty'] }}</p>
                </div>
                <div class="bg-neutral-900/70 border border-neutral-700/40 rounded-xl p-3 text-center">
                    <p class="text-[11px] text-neutral-400 uppercase tracking-wider font-medium">Cuisine</p>
                    <p class="font-bold text-sm sm:text-base text-white mt-0.5">{{ $singleRecipe['cuisine'] }}</p>
                </div>
            </div>
        </div>

        <div class="space-y-3 pt-2 border-t border-neutral-700/50">
            <h2 class="font-semibold text-sm sm:text-base text-white flex items-center gap-2">
                <i class="fa-solid fa-plate-wheat text-neutral-400"></i>
                <span>Ingredients</span>
            </h2>
            <ul class="space-y-1.5 text-xs sm:text-sm text-neutral-300">
                @foreach ($singleRecipe['ingredients'] as $ingredient)
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-circle-dot text-[9px] text-neutral-400 mt-1.5 shrink-0"></i>
                    <span class="leading-relaxed">{{ $ingredient }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="space-y-3 pt-2 border-t border-neutral-700/50">
            <h2 class="font-semibold text-sm sm:text-base text-white flex items-center gap-2">
                <i class="fa-solid fa-book-open text-neutral-400"></i>
                <span>Instructions</span>
            </h2>
            <ul class="space-y-2 text-xs sm:text-sm text-neutral-300">
                @foreach ($singleRecipe['instructions'] as $instruction)
                <li class="flex items-start gap-2.5">
                    <i class="fa-regular fa-circle-dot text-[9px] text-neutral-400 mt-1.5 shrink-0"></i>
                    <span class="leading-relaxed">{{ $instruction }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </main>
</body>

</html>
