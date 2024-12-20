<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;


class ResultadoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/resultados",
     *     summary="Get list of resultados",
     *       tags={"resultados"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Resultado::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/resultados",
     *     summary="Create a new resultado",
     *      tags={"resultados"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"CarreraId", "PilotoId", "EquipoId", "Posicion", "Tiempo", "Puntos"},
     *             @OA\Property(property="CarreraId", type="integer", example=1),
     *             @OA\Property(property="PilotoId", type="integer", example=1),
     *             @OA\Property(property="EquipoId", type="integer", example=1),
     *             @OA\Property(property="Posicion", type="integer", example=1),
     *             @OA\Property(property="Tiempo", type="string", format="time", example="01:30:00"),
     *             @OA\Property(property="Puntos", type="integer", example=25)
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
        $resultado = Resultado::create($request->all());
        return response()->json($resultado, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/resultados/{id}",
     *     summary="Get resultado by ID",
     *      tags={"resultados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function show($id)
    {
        return Resultado::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/resultados/{id}",
     *     summary="Update an existing resultado",
     *      tags={"resultados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"CarreraId", "PilotoId", "EquipoId", "Posicion", "Tiempo", "Puntos"},
     *             @OA\Property(property="CarreraId", type="integer", example=1),
     *             @OA\Property(property="PilotoId", type="integer", example=1),
     *             @OA\Property(property="EquipoId", type="integer", example=1),
     *             @OA\Property(property="Posicion", type="integer", example=1),
     *             @OA\Property(property="Tiempo", type="string", format="time", example="01:30:00"),
     *             @OA\Property(property="Puntos", type="integer", example=25)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $resultado = Resultado::findOrFail($id);
        $resultado->update($request->all());
        return response()->json($resultado, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/resultados/{id}",
     *     summary="Delete a resultado",
     *      tags={"resultados"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        Resultado::destroy($id);
        return response()->json(null, 204);
    }
}
