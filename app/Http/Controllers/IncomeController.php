<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        return Response::json($incomes);
    }

    public function show($id)
    {
        $income = Income::find($id);
        if (!$income) {
            return Response::json(['message' => 'Income not found'], 404);
        }
        return Response::json($income);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'customer_id' => 'required|integer',
            'payment_method_id' => 'required|integer',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $income = Income::create($request->all());
        return Response::json($income, 201);
    }

    public function update(Request $request, $id)
    {
        $income = Income::find($id);
        if (!$income) {
            return Response::json(['message' => 'Income not found'], 404);
        }

        $validated = $this->validate($request, [
            'customer_id' => 'sometimes|required|integer',
            'payment_method_id' => 'sometimes|required|integer',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $income->update($request->all());
        return Response::json($income);
    }

    public function destroy($id)
    {
        $income = Income::find($id);
        if (!$income) {
            return Response::json(['message' => 'Income not found'], 404);
        }

        $income->delete();
        return Response::json(['message' => 'Income deleted successfully']);
    }

    private function validate(Request $request, array $rules)
    {
        // Replace with actual validation logic
        return true;
    }
}
