<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote of the Day</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..700&family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-black text-white min-h-screen flex flex-col items-center justify-center p-8 font-poppins selection:bg-white selection:text-black antialiased">
    <main class="max-w-4xl w-full text-center space-y-8">
        <blockquote class="font-fraunces italic text-3xl sm:text-5xl md:text-6xl font-light leading-snug tracking-tight text-neutral-100">
            “{{ $singleQuotes['quote'] }}”
        </blockquote>
        <p class="font-poppins text-xs sm:text-sm md:text-base text-neutral-400 font-normal tracking-widest uppercase">
            — {{ $singleQuotes['author'] }}
        </p>
    </main>
</body>

</html>
