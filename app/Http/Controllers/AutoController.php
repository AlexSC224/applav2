<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/autos",
     *     summary="Get list of autos",
     *     tags={"Autos"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Auto::all();
    }

    /**
     * @OA\Post(
     *     path="/api/autos",
     *     summary="Create a new auto",
     * tags={"Autos"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Modelo", "Motor", "ConstructorId", "EquipoId"},
     *             @OA\Property(property="Modelo", type="string", example="Modelo A"),
     *             @OA\Property(property="Motor", type="string", example="Motor A"),
     *             @OA\Property(property="ConstructorId", type="integer", example=1),
     *             @OA\Property(property="EquipoId", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $auto = Auto::create($request->all());
        return response()->json($auto, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/autos/{id}",
     *     summary="Get auto by ID",
     *     tags={"Autos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function show($id)
    {
        return Auto::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/autos/{id}",
     *     summary="Update auto by ID",
     * tags={"Autos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Modelo", "Motor", "ConstructorId", "EquipoId"},
     *             @OA\Property(property="Modelo", type="string", example="Modelo A"),
     *             @OA\Property(property="Motor", type="string", example="Motor A"),
     *             @OA\Property(property="ConstructorId", type="integer", example=1),
     *             @OA\Property(property="EquipoId", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->update($request->all());
        return response()->json($auto, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/autos/{id}",
     *     summary="Delete auto by ID",
     * tags={"Autos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Successful operation"
     *     )
     * )
     */
    public function destroy($id)
    {
        Auto::destroy($id);
        return response()->json(null, 204);
    }
}
