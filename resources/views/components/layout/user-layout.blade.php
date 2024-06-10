<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PORTAL RW</title>
    <script defer src="{{ asset('assets/js/bundle.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}"> --}}
    {{-- <script src="{{ asset('assets/js/fontawesome.min.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/flowbite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    <script defer src="https://unpkg.com/tailwindcss-intersect@1.x.x/dist/observer.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f1f4f5]"x-data="{ 'darkMode': true, loading: true }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark text-bodydark bg-background': darkMode === true }">
    <div x-show="loading" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loading = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-[#edebfe] dark:bg-[#1f1345]">
        <div class="py-100 bg-transparent" x-show="darkMode">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" width="200"
                height="200" style="shape-rendering: auto; display: block;"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <path style="transform:scale(0.8);transform-origin:50px 50px" stroke-linecap="round"
                        d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40 C88.6 30 95 43.3 95 50s-6.4 20-19.3 20C56.4 70 43.6 30 24.3 30z"
                        stroke-dasharray="42.76482137044271 42.76482137044271" stroke-width="8" stroke="#6c2bd9"
                        fill="none">
                        <animate values="0;256.58892822265625" keyTimes="0;1" dur="1s" repeatCount="indefinite"
                            attributeName="stroke-dashoffset"></animate>
                    </path>
                    <g></g>
                </g><!-- [ldio] generated by https://loading.io -->
            </svg>
        </div>
        <div class="py-100 bg-transparent" x-show="!darkMode">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" width="200"
                height="200" style="shape-rendering: auto; display: block;"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <path style="transform:scale(0.8);transform-origin:50px 50px" stroke-linecap="round"
                        d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40 C88.6 30 95 43.3 95 50s-6.4 20-19.3 20C56.4 70 43.6 30 24.3 30z"
                        stroke-dasharray="42.76482137044271 42.76482137044271" stroke-width="8" stroke="#9061f9"
                        fill="none">
                        <animate values="0;256.58892822265625" keyTimes="0;1" dur="1s" repeatCount="indefinite"
                            attributeName="stroke-dashoffset"></animate>
                    </path>
                    <g></g>
                </g><!-- [ldio] generated by https://loading.io -->
            </svg>
        </div>
    </div>
    <div class="mb-20">
        <x-partials.user.nav />
    </div>
    {{ $slot }}
    <x-partials.user.footer />
</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.directive('log', (el, {
            expression
        }, {
            evaluateLater,
            effect
        }) => {
            let getThingToLog = evaluateLater(expression)

            effect(() => {
                getThingToLog(thingToLog => {
                    console.log(thingToLog)
                })
            })
        })
    })
</script>

</html>