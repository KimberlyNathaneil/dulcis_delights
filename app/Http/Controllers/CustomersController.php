<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return Response::json($customers);
    }
    public function show($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return Response::json(['message' => 'Customer not found'], 404);
        }
        return Response::json($customer);
    }
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $customer = Customer::create($request->all());
        return Response::json($customer, 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return Response::json(['message' => 'Customer not found'], 404);
        }

        $validated = $this->validate($request, [
            'name' => 'sometimes|required|string',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $customer->update($request->all());
        return Response::json($customer);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return Response::json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();
        return Response::json(['message' => 'Customer deleted successfully']);
    }

    private function validate(Request $request, array $rules)
    {
        // Replace with actual validation logic
        return true;
    }
}
