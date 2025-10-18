<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? '404 - Page Not Found | Sefu' }}</title>

    <meta name="description" content="Page not found">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    {{-- ===== CSS Files ===== --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: #0f172a;
            color: #fff;
            font-family: 'Circular Std Book', sans-serif;
            overflow: hidden;
            position: relative;
        }

        /* Floating gradient overlay */
        .error-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top right, rgba(14, 165, 233, 0.3), transparent),
                        radial-gradient(circle at bottom left, rgba(236, 72, 153, 0.25), transparent);
            z-index: 1;
            animation: floatBg 10s ease-in-out infinite alternate;
        }

        @keyframes floatBg {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(-40px, 40px);
            }
        }

        .error-area {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('{{ asset('assets/img/bg/error-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 50px 20px;
        }

        .error-wrapper {
            animation: fadeInUp 1s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 900;
            margin-top: 20px;
            color: transparent;
            -webkit-text-stroke: 2px #e60606ff;
            text-stroke: 2px #ca0000ff;
            margin-bottom: 20px;
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.7;
                transform: scale(1.05);
            }
        }

        .theme_btn {
            display: inline-block;
            background: linear-gradient(135deg, #ca0000ff, #df2f2fff);
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        }

        .theme_btn:hover {
            background: linear-gradient(135deg, #b80a0aff, #ca0000ff);
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(14, 165, 233, 0.5);
        }

        .logo-img img {
            transition: transform 0.4s ease;
        }

        .logo-img:hover img {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }

            .error-title {
                font-size: 1.5rem;
            }
        }
    </style>

    @livewireStyles
</head>

<body>
    <div class="error-overlay"></div>

    <main>
        <section class="error-area">
            <div class="container">
                <div class="error-wrapper">
                    <a href="{{ url('/') }}" class="logo-img mb-4 d-inline-block">
                        <img src="{{ asset('assets/img/logo/logo2.png') }}" height="45" alt="Logo">
                    </a>
                    <div class="error-code">404</div>
                    <h3 class="error-title mb-15">Uhh ohhhh……!!</h3>
                    <h3 class="error-title mb-75">The page you were looking for doesn’t exist</h3>
                    <a href="{{ url('/') }}" class="theme_btn mt-3">Go Home</a>
                </div>
            </div>
        </section>
    </main>

    @livewireScripts
</body>

</html>
