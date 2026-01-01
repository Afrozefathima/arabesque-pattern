@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Admin Login</h2>

            <form id="loginForm">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium">Email</label>
                    <input type="email" id="email" class="w-full border-gray-300 rounded-md mt-1" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                    <input type="password" id="password" class="w-full border-gray-300 rounded-md mt-1" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">
                    Login
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const res = await axios.post('/api/admin/login', {
                    email,
                    password
                });
                localStorage.setItem('admin_token', res.data.token);
                window.location.href = '/admin/dashboard';
            } catch (error) {
                alert('Invalid credentials');
            }
        });
    </script>
@endsection
