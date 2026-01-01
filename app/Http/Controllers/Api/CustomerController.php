<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
{
    return response()->json(Customer::all());
}

public function show($id)
{
    $customer = Customer::with('orders')->find($id);
    if (!$customer) return response()->json(['message' => 'Customer not found'], 404);
    return response()->json($customer);
}
}
