@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <button id="logoutBtn" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">Logout</button>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-semibold text-gray-700 mb-3">Suppliers</h2>
                <ul id="supplierList" class="text-sm text-gray-700 space-y-1"></ul>
            </div>

            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-semibold text-gray-700 mb-3">Supplier Parts</h2>
                <ul id="partList" class="text-sm text-gray-700 space-y-1"></ul>
            </div>

            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-semibold text-gray-700 mb-3">Inquiries</h2>
                <ul id="inquiryList" class="text-sm text-gray-700 space-y-1"></ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const token = localStorage.getItem('admin_token');
        if (!token) {
            window.location.href = '/admin/login';
        }

        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

        async function loadData() {
            try {
                const [suppliers, parts, inquiries] = await Promise.all([
                    axios.get('/api/admin/suppliers'),
                    axios.get('/api/admin/supplier-parts'),
                    axios.get('/api/inquiries'),
                ]);

                document.getElementById('supplierList').innerHTML =
                    suppliers.data.map(s => `<li>${s.company_name} (${s.status})</li>`).join('');

                document.getElementById('partList').innerHTML =
                    parts.data.map(p => `<li>${p.part?.partname ?? 'N/A'} - ${p.supplier?.company_name}</li>`).join('');

                document.getElementById('inquiryList').innerHTML =
                    inquiries.data.map(i => `<li>${i.name} - ${i.message}</li>`).join('');
            } catch (error) {
                console.error(error);
                alert('Session expired or unauthorized');
                localStorage.removeItem('admin_token');
                window.location.href = '/admin/login';
            }
        }

        document.getElementById('logoutBtn').addEventListener('click', () => {
            localStorage.removeItem('admin_token');
            window.location.href = '/admin/login';
        });

        loadData();
    </script>
@endsection
