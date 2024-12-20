<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;


class EquipoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/equipos",
     *     summary="Get list of equipos",
     *      tags={"equipos"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Equipo::all();
    }

    /**
     * @OA\Post(
     *     path="/api/equipos",
     *     summary="Create a new equipo",
     *      tags={"equipos"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Fundacion", "Pais", "ConstructorId"},
     *             @OA\Property(property="Nombre", type="string", example="Equipo A"),
     *             @OA\Property(property="Fundacion", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="Pais", type="string", example="Pais A"),
     *             @OA\Property(property="ConstructorId", type="integer", example=1)
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
        $equipo = Equipo::create($request->all());
        return response()->json($equipo, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/equipos/{id}",
     *     summary="Get equipo by ID",
     *      tags={"equipos"},
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
        return Equipo::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/equipos/{id}",
     *     summary="Update equipo by ID",
     *      tags={"equipos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Fundacion", "Pais", "ConstructorId"},
     *             @OA\Property(property="Nombre", type="string", example="Equipo A"),
     *             @OA\Property(property="Fundacion", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="Pais", type="string", example="Pais A"),
     *             @OA\Property(property="ConstructorId", type="integer", example=1)
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
        $equipo = Equipo::findOrFail($id);
        $equipo->update($request->all());
        return response()->json($equipo, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/equipos/{id}",
     *     summary="Delete equipo by ID",
     *      tags={"equipos"},
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
        Equipo::destroy($id);
        return response()->json(null, 204);
    }
}
