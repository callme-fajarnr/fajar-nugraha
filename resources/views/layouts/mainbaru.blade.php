<!DOCTYPE html>
{{-- <html lang="en" class="{{ session('theme', 'light') }}"> --}}
<html lang="en">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $tittle }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <!-- Bootstrap CSS (in the <head> section of your HTML) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (before the closing </body> tag) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    {{-- css jarne --}}
    <link rel="stylesheet" href="css/jarne.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Neue+Montreal+Mono:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sansation-light" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/crafter-dreams" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/bw-modelica-ss02" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">

    <!-- REACT VITE entry -->
    {{-- @vite(['resources/js/app.jsx']) --}}
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/app.js'])

    <!-- Dark mode instant apply -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>

<body>

    @if (request()->routeIs('home'))
        <div id="loader-wrapper">
            @include('partial.loader')
        </div>
    @endif
    <div class="theme-toggle-container">
        <div class="vertical-text">
            <input type="radio" name="theme" id="light" onchange="setLightMode()">
            <label for="light" class="theme-option">Light</label>

            <input type="radio" name="theme" id="dark" onchange="setDarkMode()">
            <label for="dark" class="theme-option">Dark</label>
        </div>
    </div>

    <div class="full-box">

        <div class="container-fluid px-0">
            <div class="container-home">

                <div class="left">
                    Fajar Nugraha
                    <h6 class="leftdua">Data analyst & Developer</h6>

                    <div>
                        @include('partial.barunavbar')
                    </div>
                </div>
                @yield('container')

            </div>
        </div>

    </div>

    <div class="theme-copy-container">
        <i class="bi bi-globe2"></i> FajarNr
    </div>

    <script>
        function applyTheme(theme) {
            const html = document.documentElement;

            if (theme === 'light') {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }

            // Checkbox sinkronisasi
            const lightCheckbox = document.getElementById('lightCheckbox');
            const darkCheckbox = document.getElementById('darkCheckbox');

            if (lightCheckbox && darkCheckbox) {
                lightCheckbox.checked = theme === 'light';
                darkCheckbox.checked = theme === 'dark';
            }
        }

        function setLightMode() {
            applyTheme('light');
        }

        function setDarkMode() {
            applyTheme('dark');
        }

        // Auto apply saved theme on load
        window.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            applyTheme(savedTheme);
        });
    </script>


    <script src="js/script.js"></script>
    <script src="js/nav-toggle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
