<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,scalable=no">
        <meta property="og:title" content="Bibliya - Bible Study Quiz App" />
        <meta property="og:description" content="Bibliya is your ultimate Bible study companion. Explore the Holy Bible with interactive quizzes, learn in Malayalam and English, and grow spiritually with daily questions from each chapter. Perfect for believers, Bible enthusiasts, and anyone wanting to deepen their understanding of God's Word. Start your Bible journey today! 
        ദൈവവചനത്തെ പഠിക്കാൻ ഏറ്റവും മികച്ച ഉപകരണം - ബിബ്ലിയ. മലയാളവും ഇംഗ്ലീഷും ഉൾപ്പെടുന്ന കൊയിസുകളിലൂടെ, ദൈവവചനം പഠിക്കുകയും, ദിവസേന ഓരോ അദ്ധ്യായത്തിൽ നിന്നുള്ള ചോദ്യങ്ങളിലൂടെ ആത്മികമായി വളരുകയും ചെയ്യൂ. വിശ്വാസികൾക്കും ബൈബിൾ പ്രേമികൾക്കും അതുല്യമായ അനുഭവം." />
        <meta property="og:image" content="{{ asset('images/og-image.jpg') }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="ml_IN" /> <!-- Malayalam locale -->
        <meta property="og:site_name" content="Bibliya" />        
                <meta property="og:image" content="{{ asset('/storage/image.jpg') }}" />
                <meta property="og:type" content="website" />
                <meta property="og:url" content="{{ url()->current() }}" />
        <title inertia>{{ config('app.name', 'Bibliya | Vachanavayal') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

    </body>
</html>
