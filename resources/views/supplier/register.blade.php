<x-layouts.app title="Register Supplier">
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Register Supplier</h2>
        <form action="{{ route('supplier.register.submit') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="company_name" placeholder="Company Name" class="w-full border rounded p-2" required>
            <input type="text" name="contact_person" placeholder="Contact Person" class="w-full border rounded p-2">
            <input type="email" name="email" placeholder="Email" class="w-full border rounded p-2" required>
            <input type="text" name="phone" placeholder="Phone" class="w-full border rounded p-2">
            <input type="password" name="password" placeholder="Password" class="w-full border rounded p-2" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                class="w-full border rounded p-2" required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register</button>
        </form>
    </div>
</x-layouts.app>
