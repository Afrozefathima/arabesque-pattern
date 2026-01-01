<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{
   public function showRegisterForm()
{
    return view('supplier.register');
}

public function showLoginForm()
{
    return view('supplier.login');
}

public function dashboard()
{
    return view('supplier.dashboard');
}
    // Register supplier
    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:150',
            'contact_person' => 'nullable|string|max:100',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'location' => 'nullable|string|max:150',
        ]);

        $supplier = Supplier::create([
            'company_name' => $request->company_name,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'phone' => $request->phone,
            'password_hash' => Hash::make($request->password),
            'location' => $request->location,
            'status' => 'pending', // verification status
        ]);

        $token = $supplier->createToken('supplier_api_token')->plainTextToken;

        return response()->json([
            'message'=>'Supplier Registered successfully',
            'supplier' => $supplier,
            'token' => $token,
        ], 201);
    }

    // Login supplier
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $supplier = Supplier::where('email', $request->email)->first();

        if (!$supplier || !Hash::check($request->password, $supplier->password_hash)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $supplier->createToken('supplier_api_token')->plainTextToken;

        return response()->json([
            'message'  => 'Login successful',
            'supplier' => $supplier,
            'token' => $token,
        ]);
    }

    // Get logged-in supplier info
    public function me(Request $request)
    {
        return response()->json([
            'supplier'=>$request->user()
        ]);
    }

    // Logout supplier
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
