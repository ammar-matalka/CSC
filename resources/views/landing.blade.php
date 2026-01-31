<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hero['hero_title'] ?? 'CSC Beyond' }} - Helping Your Business Expand</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 100%);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navigation -->
    <nav x-data="{ open: false, scrolled: false }"
         @scroll.window="scrolled = window.pageYOffset > 50"
         :class="scrolled ? 'bg-white shadow-lg' : 'bg-transparent'"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="#" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">CSC</span>
                    </div>
                    <span :class="scrolled ? 'text-gray-800' : 'text-white'"
                          class="text-xl font-bold transition-colors">CSC Beyond</span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#services" :class="scrolled ? 'text-gray-700 hover:text-blue-600' : 'text-white hover:text-blue-200'"
                       class="transition-colors font-medium">Services</a>
                    <a href="#solutions" :class="scrolled ? 'text-gray-700 hover:text-blue-600' : 'text-white hover:text-blue-200'"
                       class="transition-colors font-medium">Solutions</a>
                    <a href="#clients" :class="scrolled ? 'text-gray-700 hover:text-blue-600' : 'text-white hover:text-blue-200'"
                       class="transition-colors font-medium">Clients</a>
                    <a href="#news" :class="scrolled ? 'text-gray-700 hover:text-blue-600' : 'text-white hover:text-blue-200'"
                       class="transition-colors font-medium">News</a>
                    <a href="#contact" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-2 rounded-full hover:shadow-lg transform hover:scale-105 transition-all">
                        Contact Us
                    </a>
                </div>

                <button @click="open = !open" class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Background Image or Gradient -->
        @if(isset($hero['hero_background_image']) && $hero['hero_background_image'])
            <!-- Image Background with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $hero['hero_background_image']) }}"
                     alt="Hero Background"
                     class="w-full h-full object-cover">
                <!-- Dark Overlay for better text visibility -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/70 via-purple-900/70 to-pink-900/70"></div>
            </div>
        @else
            <!-- Gradient Background (default) -->
            <div class="absolute inset-0 gradient-bg"></div>
        @endif

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden z-10">
            <div class="absolute w-96 h-96 bg-white/10 rounded-full -top-48 -left-48 animate-pulse"></div>
            <div class="absolute w-96 h-96 bg-white/10 rounded-full -bottom-48 -right-48 animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-20">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    {{ $hero['hero_title'] ?? 'Helping Your Business' }}
                    <span class="block bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-pink-200">
                        {{ $hero['hero_subtitle'] ?? 'Expand Beyond' }}
                    </span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90 max-w-3xl mx-auto">
                    {{ $hero['hero_description'] ?? 'We are a group of people and a dedicated company focused on delivering the best results for our clients.' }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#services" class="glass px-8 py-4 rounded-full text-white font-semibold hover:bg-white/20 transition-all transform hover:scale-105">
                        Explore Services
                    </a>
                    <a href="#contact" class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:shadow-2xl transition-all transform hover:scale-105">
                        Get Started
                    </a>
                </div>

                <div class="mt-16 animate-bounce">
                    <i class="fas fa-chevron-down text-3xl text-white/70"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our Services</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
                <p class="mt-4 text-xl text-gray-600">Comprehensive solutions for your business needs</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-br from-{{ $service->color }}-400 to-{{ $service->color }}-600 rounded-xl flex items-center justify-center mb-6">
                            <i class="{{ $service->icon }} text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $service->title }}</h3>
                        <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                        <a href="#" class="text-{{ $service->color }}-600 font-semibold hover:text-{{ $service->color }}-700 inline-flex items-center">
                            Learn more <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-8">{{ $vision['vision_title'] ?? 'Our Vision' }}</h2>
                <div class="text-xl md:text-2xl leading-relaxed">
                    {{ $vision['vision_text'] ?? '' }}
                </div>
                <a href="#contact" class="inline-block mt-8 bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:shadow-2xl transition-all transform hover:scale-105">
                    Message Us Now!
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    @if($stats->count() > 0)
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-{{ $stats->count() }} gap-12">
                @foreach($stats as $stat)
                    <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-{{ $stat->color }}-50 to-{{ $stat->color == 'blue' ? 'purple' : 'pink' }}-50">
                        <div class="text-6xl md:text-7xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-{{ $stat->color }}-600 to-{{ $stat->color == 'blue' ? 'purple' : 'pink' }}-600 mb-4">
                            {{ $stat->number }}
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $stat->title }}</h3>
                        <p class="text-gray-600">{{ $stat->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Partners Section -->
    @if($partners->count() > 0)
    <section id="clients" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Corporate Partners</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                @foreach($partners as $partner)
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition-shadow flex items-center justify-center">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="max-w-full h-auto">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Solutions Section -->
    @if($solutions->count() > 0)
    <section id="solutions" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Solutions</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
            </div>

            @foreach($solutions as $index => $solution)
                <div class="mb-20 {{ $index == $solutions->count() - 1 ? '' : '' }}">
                    <div class="grid md:grid-cols-2 gap-12 items-center {{ $index % 2 != 0 ? 'md:flex-row-reverse' : '' }}">
                        <div class="{{ $index % 2 != 0 ? 'order-2 md:order-1' : '' }}">
                            <h3 class="text-3xl font-bold text-gray-800 mb-6">{{ $solution->title }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ $solution->description }}</p>
                            @if($solution->features)
                                <ul class="space-y-4">
                                    @foreach($solution->features as $feature)
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                            <span class="text-gray-700">{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="{{ $index % 2 != 0 ? 'order-1 md:order-2' : '' }} rounded-2xl overflow-hidden shadow-2xl">
                           @if($solution->image)
    <img src="{{ asset('storage/' . $solution->image) }}"
         alt="{{ $solution->title }}"
         class="w-full h-96 object-cover rounded-2xl">
@else
    <div class="h-96 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center rounded-2xl border-2 border-dashed border-gray-300">
        <div class="text-center">
            <i class="fas fa-image text-gray-400 text-6xl mb-4"></i>
            <p class="text-gray-500 font-medium">No image uploaded</p>
        </div>
    </div>
@endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Principles Section -->
    @if($principles->count() > 0)
    <section class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Principles And Guidelines</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-{{ $principles->count() }} gap-8">
                @foreach($principles as $principle)
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-{{ $principle->color }}-500 to-{{ $principle->color }}-600 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl font-bold">
                            {{ $principle->number }}
                        </div>
                        <h3 class="text-xl font-bold">{{ $principle->title }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- News Section -->
    @if($news->count() > 0)
    <section id="news" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Latest News</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>
                        @endif
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">{{ $item->published_at->format('F j, Y') }}</div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $item->excerpt }}</p>
                            <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                                Read more <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Get In Touch</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
                    <p class="mt-4 text-xl text-gray-600">Let's discuss how we can help your business grow</p>
                </div>

                <form action="#" method="POST" class="bg-gray-50 rounded-2xl p-8 shadow-lg">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                            <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Phone Number *</label>
                            <input type="tel" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                        <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">How can we help? *</label>
                        <textarea rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-none" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 rounded-lg font-semibold hover:shadow-lg transition-all transform hover:scale-105">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">CSC</span>
                        </div>
                        <span class="text-xl font-bold">CSC Beyond</span>
                    </div>
                    <p class="text-gray-400">{{ $footer['footer_text'] ?? 'Helping Your Business Expand' }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-400 hover:text-white transition">Services</a></li>
                        <li><a href="#solutions" class="text-gray-400 hover:text-white transition">Solutions</a></li>
                        <li><a href="#clients" class="text-gray-400 hover:text-white transition">Clients</a></li>
                        <li><a href="#news" class="text-gray-400 hover:text-white transition">News</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i> {{ $contact['contact_email'] ?? 'info@cscbeyond.com' }}</li>
                        <li><i class="fas fa-phone mr-2"></i> {{ $contact['contact_phone'] ?? '919-324-6505' }}</li>
                        <li><i class="fas fa-clock mr-2"></i> {{ $contact['contact_hours'] ?? 'Mon-Fri: 7:00 AM – 7:00 PM' }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Latest News</h3>
                    <ul class="space-y-2">
                        @foreach($news->take(3) as $item)
                            <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">{{ Str::limit($item->title, 50) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    {{ $footer['copyright_text'] ?? '© 2005-2026 CSC Beyond. All Rights Reserved' }}
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gradient-to-r hover:from-purple-600 hover:to-pink-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button x-data="{ show: false }"
            @scroll.window="show = window.pageYOffset > 500"
            x-show="show"
            x-transition
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full shadow-lg hover:shadow-2xl transition-all transform hover:scale-110 flex items-center justify-center z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

</body>
</html>
