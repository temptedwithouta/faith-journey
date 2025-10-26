<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Faith Journey</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .bg-primary {
        background-color: #4B352A;
    }

    .bg-secondary {
        background-color: #CA7842;
    }

    .bg-accent {
        background-color: #B2CD9C;
    }

    .bg-light {
        background-color: #F0F2BD;
    }

    .text-primary {
        color: #4B352A;
    }

    .text-secondary {
        color: #CA7842;
    }

    .text-accent {
        color: #B2CD9C;
    }

    .text-light {
        color: #F0F2BD;
    }

    .border-primary {
        border-color: #4B352A;
    }

    .border-secondary {
        border-color: #CA7842;
    }

    .border-accent {
        border-color: #B2CD9C;
    }

    .hover\:bg-primary:hover {
        background-color: #4B352A;
    }

    .hover\:bg-secondary:hover {
        background-color: #CA7842;
    }
</style>
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Toast Notification -->
    <x-toast-notification />

    <!-- Navigation -->
    <nav class="bg-primary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <i class="fas fa-cross text-light text-2xl"></i>
                        <span class="text-light text-xl font-bold">Faith Journey</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-light hover:text-accent transition duration-300">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="{{ route('devotions.index') }}"
                        class="text-light hover:text-accent transition duration-300">
                        <i class="fas fa-book-open mr-2"></i>Devotions
                    </a>
                    {{-- <a href="/about" class="text-light hover:text-accent transition duration-300">
                        <i class="fas fa-heart mr-2"></i>About
                    </a>
                    <a href="/contact" class="text-light hover:text-accent transition duration-300">
                        <i class="fas fa-envelope mr-2"></i>Contact
                    </a> --}}
                </div>

                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('auth.login') }}"
                            class="text-light hover:text-accent transition duration-300">Sign In</a>
                        <a href="{{ route('users.register') }}"
                            class="bg-secondary hover:bg-opacity-80 text-white px-4 py-2 rounded-lg transition duration-300">Register</a>
                    @else
                        <div class="relative">
                            <button class="text-light hover:text-accent transition duration-300 flex items-center">
                                <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
                                <i class="fas fa-chevron-down ml-2"></i>
                            </button>
                        </div>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-light hover:text-accent">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main x-data="app">
        {{ $slot }}
    </main>

    <!-- Register -->
    @if (!Request::is('register'))
        <section class="py-16 bg-primary">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <i class="fas fa-envelope text-5xl text-accent mb-6"></i>
                <h2 class="text-3xl font-bold text-white mb-4">
                    Get Daily Devotions
                </h2>
                <p class="text-xl text-gray-300 mb-8">
                    Subscribe now to receive inspiring articles directly in your email every day
                </p>
                <a href="{{ route('users.register') }}"
                    class="bg-secondary hover:bg-opacity-90 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                    Subscribe Now
                </a>
                <p class="text-sm text-gray-400 mt-4">
                    <i class="fas fa-shield-alt mr-2"></i>
                    We respect your privacy. Unsubscribe at any time.
                </p>
            </div>
        </section>
    @endif

    <!-- Footer -->
    <footer class="bg-primary text-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-cross text-2xl"></i>
                        <span class="text-xl font-bold">Faith Journey</span>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Join us on a meaningful faith journey. Find inspiration and strength through our daily
                        devotions.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-accent hover:text-light transition duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-accent hover:text-light transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-accent hover:text-light transition duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-300 hover:text-light transition duration-300">Home</a>
                        </li>
                        <li><a href="{{ route('devotions.index') }}"
                                class="text-gray-300 hover:text-light transition duration-300">Devotions</a></li>
                        {{-- <li><a href="/about" class="text-gray-300 hover:text-light transition duration-300">Tentang</a>
                        </li>
                        <li><a href="/contact" class="text-gray-300 hover:text-light transition duration-300">Kontak</a>
                        </li> --}}
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><i class="fas fa-envelope mr-2"></i>info@faithjourney.com</li>
                        <li><i class="fas fa-phone mr-2"></i>+62 123 456 789</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-600 mt-8 pt-8 text-center">
                <p class="text-gray-300">&copy; {{ date('Y') }} Faith Journey. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        window.app_error = '{{ session('app_error') }}';
    </script>
</body>

</html>
