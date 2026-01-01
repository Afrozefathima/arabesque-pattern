<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierPart;
use App\Models\Inquiry;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->take(10)->get();
        $parts = SupplierPart::latest()->take(10)->get();
        $inquiries = Inquiry::latest()->take(10)->get();

        return view('admin.dashboard', compact('suppliers', 'parts', 'inquiries'));
    }
}