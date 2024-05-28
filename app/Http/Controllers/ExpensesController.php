<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return Response::json($expenses);
    }

    public function show($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return Response::json(['message' => 'Expense not found'], 404);
        }
        return Response::json($expense);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'product_id' => 'required|integer',
            'note' => 'required|string',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $expense = Expense::create($request->all());
        return Response::json($expense, 201);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return Response::json(['message' => 'Expense not found'], 404);
        }

        $validated = $this->validate($request, [
            'product_id' => 'sometimes|required|integer',
            'note' => 'sometimes|required|string',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $expense->update($request->all());
        return Response::json($expense);
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return Response::json(['message' => 'Expense not found'], 404);
        }

        $expense->delete();
        return Response::json(['message' => 'Expense deleted successfully']);
    }

    private function validate(Request $request, array $rules)
    {
        // Replace with actual validation logic
        return true;
    }
}
