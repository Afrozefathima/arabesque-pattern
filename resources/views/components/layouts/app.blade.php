<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Spare Parts Marketplace' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 antialiased">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full z-50">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                {{-- Logo --}}
                <a href="/" class="text-2xl font-bold text-red-600">
                    Parts<span class="text-gray-800">Marketplace</span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-700 hover:text-red-600 font-medium">Home</a>
                    <a href="/supplier/login" class="text-gray-700 hover:text-red-600 font-medium">
                        Supplier Login
                    </a>
                    <a href="/supplier/register" class="text-gray-700 hover:text-red-600 font-medium">
                        Become a Supplier
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <button id="menuBtn" class="md:hidden text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
                <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
                <a href="/supplier/login" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Supplier Login
                </a>
                <a href="/supplier/register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Become a Supplier
                </a>
            </div>
        </nav>

        <main class="container mx-auto py-10 px-4">
            @yield('content')
        </main>

        <script>
            // Simple mobile menu toggle
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            //submit inquiry
            document.getElementById('inquiryForm').addEventListener('submit', async (e) => {
                e.preventDefault();

                const form = e.target;
                const data = Object.fromEntries(new FormData(form).entries());
                const messageBox = document.getElementById('formMessage');

                messageBox.classList.remove('hidden');
                messageBox.textContent = 'Sending your inquiry...';
                messageBox.classList.add('text-gray-600');

                try {
                    const response = await fetch('/api/inquiries', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            ...data,
                            part_id: 1
                        }) // For now static part_id
                    });

                    if (!response.ok) throw new Error('Failed to send');

                    form.reset();
                    messageBox.textContent = '✅ Inquiry sent successfully!';
                    messageBox.classList.remove('text-gray-600', 'text-red-500');
                    messageBox.classList.add('text-green-600');
                } catch (error) {
                    messageBox.textContent = '❌ Something went wrong. Please try again.';
                    messageBox.classList.remove('text-gray-600', 'text-green-600');
                    messageBox.classList.add('text-red-500');
                }
            });
            //Get latest inquiries
            document.addEventListener('DOMContentLoaded', async () => {
                const list = document.getElementById('inquiryList');
                const loading = document.getElementById('loadingInquiries');

                try {
                    const res = await fetch('/api/inquiries');
                    const inquiries = await res.json();

                    if (Array.isArray(inquiries) && inquiries.length) {
                        list.innerHTML = inquiries.map(inq => `
        <div class="bg-gray-50 shadow-md hover:shadow-lg transition rounded-2xl p-6">
          <div class="flex flex-col h-full justify-between">
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-2">${inq.name ?? 'Anonymous'}</h3>
              <p class="text-sm text-gray-600 mb-1"><strong>Location:</strong> ${inq.location ?? 'N/A'}</p>
              <p class="text-sm text-gray-600 mb-4">${inq.message ?? 'No message provided'}</p>
            </div>
            <div class="text-sm text-gray-400 border-t pt-3">
              <span class="italic">${inq.email ?? 'No email'}</span>
            </div>
          </div>
        </div>
      `).join('');
                        loading.style.display = 'none';
                    } else {
                        loading.textContent = 'No inquiries yet. Be the first to send one!';
                    }
                } catch (error) {
                    loading.textContent = 'Failed to load inquiries.';
                }
            });
        </script>
    </header>

    <main class="pt-20">
        {{ $slot }}
    </main>

    <footer class="mt-16 py-10 bg-gray-900 text-gray-400 text-center text-sm">
        © {{ date('Y') }} PartsMarket. All Rights Reserved.
    </footer>
</body>

</html>
