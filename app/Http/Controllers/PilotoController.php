<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use Illuminate\Http\Request;


class PilotoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/pilotos",
     *     summary="Get list of pilotos",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Piloto::all();
    }

    /**
     * @OA\Post(
     *     path="/api/pilotos",
     *     summary="Create a new piloto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "FechaNacimiento", "Pais", "EquipoId"},
     *             @OA\Property(property="Nombre", type="string", example="Piloto A"),
     *             @OA\Property(property="FechaNacimiento", type="string", format="date", example="1990-01-01"),
     *             @OA\Property(property="Pais", type="string", example="Pais A"),
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
        $piloto = Piloto::create($request->all());
        return response()->json($piloto, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/pilotos/{id}",
     *     summary="Get piloto by ID",
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
        return Piloto::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/pilotos/{id}",
     *     summary="Update piloto by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "FechaNacimiento", "Pais", "EquipoId"},
     *             @OA\Property(property="Nombre", type="string", example="Piloto A"),
     *             @OA\Property(property="FechaNacimiento", type="string", format="date", example="1990-01-01"),
     *             @OA\Property(property="Pais", type="string", example="Pais A"),
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
        $piloto = Piloto::findOrFail($id);
        $piloto->update($request->all());
        return response()->json($piloto, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/pilotos/{id}",
     *     summary="Delete piloto by ID",
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
        Piloto::destroy($id);
        return response()->json(null, 204);
    }
}
