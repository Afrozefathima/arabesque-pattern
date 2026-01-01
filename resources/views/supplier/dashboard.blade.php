@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-2xl p-8 mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Supplier Dashboard</h2><button id="logoutBtn"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Logout
        </button>
        <p id="supplierName" class="text-gray-600 mb-6">Loading your profile...</p>

        <div id="partsSection" class="hidden">
            <h3 class="text-lg font-semibold mb-2">Your Parts</h3>
            <ul id="partsList" class="list-disc pl-6 text-gray-700"></ul>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('supplier_token');
            if (!token) {
                window.location.href = '/supplier/login';
                return;
            }

            try {
                // Verify token and load supplier data
                const res = await axios.get('/api/suppliers/me', {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });
                const supplier = res.data.supplier;
                document.getElementById('supplierName').textContent = `Welcome, ${supplier.company_name}`;
                document.getElementById('partsSection').classList.remove('hidden');

                // Fetch supplier parts
                const partsRes = await axios.get('/api/supplier-parts', {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });
                const parts = partsRes.data;
                const list = document.getElementById('partsList');
                parts.forEach(p => {
                    const li = document.createElement('li');
                    li.textContent =
                        `${p.part?.partname || 'Unknown Part'} — Status: ${p.verification_status}`;
                    list.appendChild(li);
                });
            } catch (error) {
                console.error(error);
                localStorage.removeItem('supplier_token');
                window.location.href = '/supplier/login';
            }
        });
        document.getElementById('logoutBtn').addEventListener('click', async () => {
            const token = localStorage.getItem('supplier_token');
            if (token) {
                await axios.post('/api/suppliers/logout', {}, {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });
                localStorage.removeItem('supplier_token');
            }
            window.location.href = '/supplier/login';
        });
    </script>
@endsection
