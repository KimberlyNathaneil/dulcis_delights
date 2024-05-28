<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterPaymentMethodController extends Controller
{
    public function index()
    {
        $methods = MasterPaymentMethod::all();
        return Response::json($methods);
    }

    public function show($id)
    {
        $method = MasterPaymentMethod::find($id);
        if (!$method) {
            return Response::json(['message' => 'Payment method not found'], 404);
        }
        return Response::json($method);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|unique:master_payment_methods',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $method = MasterPaymentMethod::create($request->all());
        return Response::json($method, 201);
    }

    public function update(Request $request, $id)
    {
        $method = MasterPaymentMethod::find($id);
        if (!$method) {
            return Response::json(['message' => 'Payment method not found'], 404);
        }

        $validated = $this->validate($request, [
            'name' => 'sometimes|required|string|unique:master_payment_methods,name,' . $method->id,
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $method->update($request->all());
        return Response::json($method);
    }

    public function destroy($id)
    {
        $method = MasterPaymentMethod::find($id);
        if (!$method) {
            return Response::json(['message' => 'Payment method not found'], 404);
        }

        $method->delete();
        return Response::json(['message' => 'Payment method deleted successfully']);
    }

    private function validate(Request $request, array $rules)
    {
        // Replace with actual validation logic
        return true;
    }
}
