<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/campeonatos",
     *     summary="Get list of campeonatos",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Campeonato::all();
    }

    /**
     * @OA\Post(
     *     path="/api/campeonatos",
     *     summary="Create a new campeonato",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Año"},
     *             @OA\Property(property="Nombre", type="string", example="Campeonato A"),
     *             @OA\Property(property="Año", type="integer", example=2023)
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
        $campeonato = Campeonato::create($request->all());
        return response()->json($campeonato, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/campeonatos/{id}",
     *     summary="Get campeonato by ID",
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
        return Campeonato::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/campeonatos/{id}",
     *     summary="Update campeonato by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Año"},
     *             @OA\Property(property="Nombre", type="string", example="Campeonato A"),
     *             @OA\Property(property="Año", type="integer", example=2023)
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
        $campeonato = Campeonato::findOrFail($id);
        $campeonato->update($request->all());
        return response()->json($campeonato, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/campeonatos/{id}",
     *     summary="Delete campeonato by ID",
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
        Campeonato::destroy($id);
        return response()->json(null, 204);
    }
}
