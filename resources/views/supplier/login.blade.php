@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-2xl p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Supplier Login</h2>

        <form id="loginForm">
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" required class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" required class="w-full border rounded-lg p-2">
            </div>

            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700">
                Login
            </button>

            <p id="errorMsg" class="text-red-600 text-sm mt-2"></p>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const form = e.target;
            const data = {
                email: form.email.value,
                password: form.password.value
            };

            try {
                const res = await axios.post('/api/suppliers/login', data);
                localStorage.setItem('supplier_token', res.data.token);
                window.location.href = '/supplier/dashboard';
            } catch (error) {
                document.getElementById('errorMsg').textContent = 'Invalid credentials';
            }
        });
    </script>
@endsection
