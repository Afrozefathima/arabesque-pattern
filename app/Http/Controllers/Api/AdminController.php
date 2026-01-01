<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\SupplierPart;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    // Admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password_hash)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json([
            'admin' => $admin,
            'token' => $token
        ]);
    }

    // List all suppliers
    public function listSuppliers()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    // List all supplier parts with status
    public function listSupplierParts()
    {
        $parts = SupplierPart::with(['supplier', 'part'])->get();
        return response()->json($parts);
    }

    // Verify supplier part (approve/reject)
    public function verifySupplierPart(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $supplierPart = SupplierPart::find($id);
        if (!$supplierPart) {
            return response()->json(['message' => 'Supplier part not found'], 404);
        }

        $supplierPart->verification_status = $request->status;
        $supplierPart->save();

        return response()->json([
            'message' => 'Supplier part updated',
            'supplier_part' => $supplierPart
        ]);
    }
}
