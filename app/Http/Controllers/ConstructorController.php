<?php

namespace App\Http\Controllers;

use App\Models\Constructor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ConstructorController extends Controller
{
    public function index()
    {
        try {
            $constructores = Constructor::all();
            return response()->json($constructores, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching constructors: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching constructors'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'Nombre' => 'required|string|max:255',
                'Pais' => 'required|string|max:255',
            ]);

            $constructor = Constructor::create($request->all());
            return response()->json($constructor, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Error creating constructor: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating constructor'], 500);
        }
    }

    public function show($id)
    {
        try {
            $constructor = Constructor::findOrFail($id);
            return response()->json($constructor, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Constructor not found'], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching constructor: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching constructor'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'Nombre' => 'sometimes|required|string|max:255',
                'Pais' => 'sometimes|required|string|max:255',
            ]);

            $constructor = Constructor::findOrFail($id);
            $constructor->update($request->all());
            return response()->json($constructor, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Constructor not found'], 404);
        } catch (\Exception $e) {
            Log::error('Error updating constructor: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating constructor'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $constructor = Constructor::findOrFail($id);
            $constructor->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Constructor not found'], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting constructor: ' . $e->getMessage());
            return response()->json(['error' => 'Error deleting constructor'], 500);
        }
    }
}
