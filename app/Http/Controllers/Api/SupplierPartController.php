<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierPart;
use App\Models\Stock;
use App\Models\Part;

class SupplierPartController extends Controller
{
    // List all parts of the logged-in supplier
    public function index(Request $request)
    {
        $supplierParts = SupplierPart::with(['part', 'stock'])
            ->where('supplier_id', $request->user()->supplier_id)
            ->get();

        return response()->json($supplierParts);
    }

    // Add a new part for supplier
    public function store(Request $request)
    {
        $request->validate([
            'part_id' => 'required|exists:parts,part_id',
            'price' => 'nullable|numeric',
            'condition' => 'required|in:new,used,refurbished',
            'stock_quantity' => 'nullable|integer|min:0',
            'on_order' => 'nullable|integer|min:0',
        ]);

        $supplierPart = SupplierPart::create([
            'supplier_id' => $request->user()->supplier_id,
            'part_id' => $request->part_id,
            'price' => $request->price,
            'condition' => $request->condition,
            'verification_status' => 'pending', // initial status
        ]);

        // Create stock if provided
        if ($request->has('stock_quantity') || $request->has('on_order')) {
            Stock::create([
                'supplier_part_id' => $supplierPart->supplier_part_id,
                'stock_quantity' => $request->stock_quantity ?? 0,
                'on_order' => $request->on_order ?? 0,
                'sold' => 0,
            ]);
        }

        return response()->json($supplierPart->load('part', 'stock'), 201);
    }

    // Update part info
    public function update(Request $request, $id)
    {
        $supplierPart = SupplierPart::where('supplier_id', $request->user()->supplier_id)
            ->find($id);

        if (!$supplierPart) {
            return response()->json(['message' => 'Part not found'], 404);
        }

        $request->validate([
            'price' => 'nullable|numeric',
            'condition' => 'nullable|in:new,used,refurbished',
            'stock_quantity' => 'nullable|integer|min:0',
            'on_order' => 'nullable|integer|min:0',
        ]);

        $supplierPart->update($request->only(['price', 'condition']));

        // Update stock if provided
        if ($request->has('stock_quantity') || $request->has('on_order')) {
            $stock = $supplierPart->stock ?? new Stock(['supplier_part_id' => $supplierPart->supplier_part_id]);
            $stock->stock_quantity = $request->stock_quantity ?? $stock->stock_quantity ?? 0;
            $stock->on_order = $request->on_order ?? $stock->on_order ?? 0;
            $stock->sold = $stock->sold ?? 0;
            $stock->save();
        }

        return response()->json($supplierPart->load('part', 'stock'));
    }

    // Delete supplier part
    public function destroy(Request $request, $id)
    {
        $supplierPart = SupplierPart::where('supplier_id', $request->user()->supplier_id)
            ->find($id);

        if (!$supplierPart) {
            return response()->json(['message' => 'Part not found'], 404);
        }

        $supplierPart->delete();
        return response()->json(['message' => 'Supplier part deleted']);
    }
}
