<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Part::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    // POST /api/parts
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'part_name' => 'required|string|max:150',
        ]);

        $part = Part::create($request->all());
        return response()->json($part, 201);
    }


    /**
     * Display the specified resource.
     */
    // GET /api/parts/{id}
    public function show($id)
    {
        $part = Part::find($id);
        if (!$part) {
            return response()->json(['message' => 'Part not found'], 404);
        }
        return response()->json($part);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $part = Part::find($id);
        if (!$part) {
            return response()->json(['message' => 'Part not found'], 404);
        }

        $part->update($request->all());
        return response()->json($part);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $part = Part::find($id);
        if (!$part) {
            return response()->json(['message' => 'Part not found'], 404);
        }

        $part->delete();
        return response()->json(['message' => 'Part deleted']);
    }
}
