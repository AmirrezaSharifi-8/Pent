<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>دستیار شخصی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="دستیار شخصی" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Vazirmatn --}}
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Vazirmatn", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 h-[100vh] flex justify-center items-center">
<main class="bg-white w-120 shadow-xl rounded-xl p-8">
    @yield('content')
</main>

</body>

</html>
