<x-layouts.app title="Home">

    <!-- 1️⃣ Hero Section -->
    <section class="relative h-[80vh] flex items-center justify-center text-center text-white">
        <img src="/img/car-spare-parts.png" alt="Header Image"
            class="absolute inset-0 w-full h-full object-cover opacity-70">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6">Find the Right Spare Parts, Fast</h1>
            <p class="text-lg md:text-xl mb-8">Trusted suppliers across UAE — genuine parts for every make & model.</p>
            <a href="/get-in-touch"
                class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition">
                Get Started
            </a>
        </div>
    </section>

    <!--Form-->
    <section id="inquiry" class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-8">
                Get a Quick Quote
            </h2>

            <form id="inquiryForm" class="bg-white shadow-lg rounded-2xl p-8 space-y-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name"
                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500"
                        placeholder="Your name" required>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500"
                        placeholder="you@example.com" required>
                </div>

                <!-- WhatsApp -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                    <input type="text" name="whatsapp_no"
                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500"
                        placeholder="+9715xxxxxxxx">
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="location"
                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500"
                        placeholder="e.g. Dubai">
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Your Inquiry</label>
                    <textarea name="message" rows="4"
                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500"
                        placeholder="Describe what part you’re looking for..."></textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all">
                        Send Inquiry
                    </button>
                </div>

                <p id="formMessage" class="text-center text-sm mt-3 hidden"></p>
            </form>
        </div>
    </section>
    <!-- Latest Inquiries Section -->
    <section id="latest-inquiries" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-10">
                <span class="text-red-600">Latest</span> Received Inquiries
            </h2>

            <div id="inquiryList" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Inquiry cards will be inserted here dynamically -->
            </div>

            <div id="loadingInquiries" class="text-center text-gray-500 mt-6">Loading inquiries...</div>
        </div>
    </section>

    <!-- 2️⃣ Why Brand Section -->
    <section id="why" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Why Choose <span class="text-red-600">PartsMarket?</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">
                We connect you directly with verified spare part suppliers offering the best prices and availability
                across the UAE.
            </p>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-3 text-red-600">Verified Suppliers</h3>
                    <p class="text-gray-600">All our suppliers are verified for authenticity and reliability.</p>
                </div>
                <div class="p-6 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-3 text-red-600">Fast Response</h3>
                    <p class="text-gray-600">Get quick quotes and delivery options for your requested parts.</p>
                </div>
                <div class="p-6 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-3 text-red-600">Best Price</h3>
                    <p class="text-gray-600">Compare and get the best deals from multiple suppliers instantly.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3️⃣ Carousel Section -->
    <section id="carousel" class="py-20 relative bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Our Brands</h2>

            <div class="overflow-x-auto flex space-x-6 snap-x snap-mandatory">
                @foreach (['toyota.webp', 'honda.webp', 'nissan.webp', 'bmw.webp', 'audi.webp'] as $brand)
                    <div
                        class="min-w-[250px] snap-center bg-gray-100 rounded-2xl shadow p-6 flex flex-col items-center justify-center">
                        <img src="/img/{{ $brand }}" alt="Brand" class="h-24 mb-4 object-contain">
                        <p class="font-semibold text-gray-700">{{ ucfirst(str_replace('.jpg', '', $brand)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4️⃣ Testimonials Section -->
    <section id="testimonials" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12 text-gray-800">What Our Customers Say</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 bg-white rounded-2xl shadow">
                    <p class="text-gray-600 mb-4">“Got genuine Toyota parts at an amazing price within hours.”</p>
                    <h4 class="font-semibold text-red-600">Ahmed R.</h4>
                    <span class="text-sm text-gray-400">Dubai</span>
                </div>
                <div class="p-6 bg-white rounded-2xl shadow">
                    <p class="text-gray-600 mb-4">“Very reliable and responsive supplier network.”</p>
                    <h4 class="font-semibold text-red-600">Fatima K.</h4>
                    <span class="text-sm text-gray-400">Sharjah</span>
                </div>
                <div class="p-6 bg-white rounded-2xl shadow">
                    <p class="text-gray-600 mb-4">“Smooth experience — found rare BMW parts easily.”</p>
                    <h4 class="font-semibold text-red-600">Omar L.</h4>
                    <span class="text-sm text-gray-400">Abu Dhabi</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 5️⃣ Parts Listing Section -->
    <section id="parts" class="py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Explore Popular Spare Parts</h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach (['Brake Pad', 'Oil Filter', 'Radiator', 'Headlight', 'Shock Absorber', 'Alternator', 'Air Filter', 'Battery'] as $part)
                    <div class="p-6 bg-white rounded-2xl shadow hover:shadow-lg transition">
                        <img src="/img/bestune.webp" alt="{{ $part }}"
                            class="w-full h-40 object-cover rounded-lg mb-4">
                        <h4 class="font-semibold text-gray-700">{{ $part }}</h4>
                        <p class="text-gray-500 text-sm mt-2">High-quality {{ strtolower($part) }} for multiple car
                            brands.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.app>
