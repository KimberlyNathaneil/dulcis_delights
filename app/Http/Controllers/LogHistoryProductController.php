<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogHistoryProductController extends Controller
{
    public function index()
    {
        $logs = LogHistoryProduct::all();
        return Response::json($logs);
    }

    public function show($id)
    {
        $log = LogHistoryProduct::find($id);
        if (!$log) {
            return Response::json(['message' => 'Log not found'], 404);
        }
        return Response::json($log);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $log = LogHistoryProduct::create($request->all());
        return Response::json($log, 201);
    }

    public function update(Request $request, $id)
    {
        $log = LogHistoryProduct::find($id);
        if (!$log) {
            return Response::json(['message' => 'Log not found'], 404);
        }

        $validated = $this->validate($request, [
            'product_id' => 'sometimes|required|integer',
            'quantity' => 'sometimes|required|integer',
        ]);

        if ($validated !== true) {
            return Response::json($validated, 422);
        }

        $log->update($request->all());
        return Response::json($log);
    }

    public function destroy($id)
    {
        $log = LogHistoryProduct::find($id);
        if (!$log) {
            return Response::json(['message' => 'Log not found'], 404);
        }

        $log->delete();
        return Response::json(['message' => 'Log deleted successfully']);
    }

    private function validate(Request $request, array $rules)
    {
        // Replace with actual validation logic
        return true;
    }
}
