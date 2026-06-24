<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP-Bro | Server Lookup Tool</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    
    <style>
        .theme-switch { cursor: pointer; font-size: 1.2rem; }
        body { transition: background-color 0.3s ease, color 0.3s ease; }
        
        /* Fixed Background Lottie Styling */
        .lottie-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;          /* Puts it behind all your app content */
            opacity: 0.15;        /* 0.15 keeps it subtle. Change to 1.0 for full color */
            pointer-events: none; /* Prevents the animation from blocking your mouse clicks */
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-body-tertiary">

    <div class="lottie-bg">
        <dotlottie-player 
            src="https://lottie.host/6edac1fb-3b2c-4fd6-b982-ad2cad77b3f8/Q530bNjtrG.json" 
            background="transparent" 
            speed="1" 
            style="width: 100%; height: 100%;" 
            loop 
            autoplay>
        </dotlottie-player>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🌐 IP-Bro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">New Lookup</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('history') }}">History</a></li>
                    <li class="nav-item ms-3">
                        <span class="theme-switch text-warning" id="themeToggle" title="Toggle Theme">☀️</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const toggleBtn = document.getElementById('themeToggle');
        const htmlElement = document.documentElement;
        
        const savedTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-bs-theme', savedTheme);
        toggleBtn.innerText = savedTheme === 'dark' ? '🌙' : '☀️';

        toggleBtn.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            toggleBtn.innerText = newTheme === 'dark' ? '🌙' : '☀️';
        });
    </script>
    @stack('scripts')
</body>
</html>
