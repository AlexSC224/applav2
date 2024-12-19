<?php

namespace App\Http\Controllers;

use App\Models\Patrocinio;
use Illuminate\Http\Request;


class PatrocinioController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/patrocinios",
     *     summary="Get list of patrocinios",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Patrocinio::all();
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
     *     path="/api/patrocinios",
     *     summary="Create a new patrocinio",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"EquipoId", "PatrocinadorId", "FechaInicio", "FechaFin"},
     *             @OA\Property(property="EquipoId", type="integer", example=1),
     *             @OA\Property(property="PatrocinadorId", type="integer", example=1),
     *             @OA\Property(property="FechaInicio", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="FechaFin", type="string", format="date", example="2023-12-31")
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
        $patrocinio = Patrocinio::create($request->all());
        return response()->json($patrocinio, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/patrocinios/{id}",
     *     summary="Get patrocinio by ID",
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
        return Patrocinio::findOrFail($id);
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
     *     path="/api/patrocinios/{id}",
     *     summary="Update patrocinio by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"EquipoId", "PatrocinadorId", "FechaInicio", "FechaFin"},
     *             @OA\Property(property="EquipoId", type="integer", example=1),
     *             @OA\Property(property="PatrocinadorId", type="integer", example=1),
     *             @OA\Property(property="FechaInicio", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="FechaFin", type="string", format="date", example="2023-12-31")
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
        $patrocinio = Patrocinio::findOrFail($id);
        $patrocinio->update($request->all());
        return response()->json($patrocinio, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/patrocinios/{id}",
     *     summary="Delete patrocinio by ID",
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
        Patrocinio::destroy($id);
        return response()->json(null, 204);
    }
}
