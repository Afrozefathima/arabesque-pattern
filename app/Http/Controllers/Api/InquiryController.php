<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    // GET /api/inquiries
    public function index()
    {
        // Include related part and user
        $inquiries = Inquiry::with(['part', 'user'])->get();
        return response()->json($inquiries);
    }

    // GET /api/inquiries/{id}
    public function show($id)
    {
        $inquiry = Inquiry::with(['part', 'user'])->find($id);
        if (!$inquiry) {
            return response()->json(['message' => 'Inquiry not found'], 404);
        }
        return response()->json($inquiry);
    }

    // POST /api/inquiries
    public function store(Request $request)
    {
        $request->validate([
            'part_id' => 'required|exists:parts,part_id',
            'user_id' => 'nullable|exists:users,user_id',
            'whatsapp_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
            'name' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        $inquiry = Inquiry::create($request->all());
        return response()->json($inquiry, 201);
    }

    // PUT /api/inquiries/{id}
    public function update(Request $request, $id)
    {
        $inquiry = Inquiry::find($id);
        if (!$inquiry) {
            return response()->json(['message' => 'Inquiry not found'], 404);
        }

        $inquiry->update($request->all());
        return response()->json($inquiry);
    }

    // DELETE /api/inquiries/{id}
    public function destroy($id)
    {
        $inquiry = Inquiry::find($id);
        if (!$inquiry) {
            return response()->json(['message' => 'Inquiry not found'], 404);
        }

        $inquiry->delete();
        return response()->json(['message' => 'Inquiry deleted']);
    }
}