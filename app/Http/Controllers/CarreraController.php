<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;


class CarreraController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/carreras",
     *     summary="Get list of carreras",
     *     tags={"carreras"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Carrera::all();
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
     *     path="/api/carreras",
     *     summary="Create a new carrera",
     *      tags={"carreras"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Fecha", "CircuitoId", "CampeonatoId"},
     *             @OA\Property(property="Nombre", type="string", example="Carrera A"),
     *             @OA\Property(property="Fecha", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="CircuitoId", type="integer", example=1),
     *             @OA\Property(property="CampeonatoId", type="integer", example=1)
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
        $carrera = Carrera::create($request->all());
        return response()->json($carrera, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/carreras/{id}",
     *     summary="Get carrera by ID",
     *      tags={"carreras"},
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
        return Carrera::findOrFail($id);
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
     *     path="/api/carreras/{id}",
     *     summary="Update carrera by ID",
     *      tags={"carreras"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Fecha", "CircuitoId", "CampeonatoId"},
     *             @OA\Property(property="Nombre", type="string", example="Carrera A"),
     *             @OA\Property(property="Fecha", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="CircuitoId", type="integer", example=1),
     *             @OA\Property(property="CampeonatoId", type="integer", example=1)
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
        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());
        return response()->json($carrera, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/carreras/{id}",
     *     summary="Delete carrera by ID",
     *      tags={"carreras"},
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
        Carrera::destroy($id);
        return response()->json(null, 204);
    }
}
