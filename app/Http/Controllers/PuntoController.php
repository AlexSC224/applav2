<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use Illuminate\Http\Request;


class PuntoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/puntos",
     *     summary="Get list of puntos",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Punto::all();
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
     *     path="/api/puntos",
     *     summary="Create a new punto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Posicion", "Puntos"},
     *             @OA\Property(property="Posicion", type="integer", example=1),
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
        $punto = Punto::create($request->all());
        return response()->json($punto, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/puntos/{id}",
     *     summary="Get punto by ID",
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
        return Punto::findOrFail($id);
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
     *     path="/api/puntos/{id}",
     *     summary="Update punto by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Posicion", "Puntos"},
     *             @OA\Property(property="Posicion", type="integer", example=1),
     *             @OA\Property(property="Puntos", type="integer", example=25)
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
        $punto = Punto::findOrFail($id);
        $punto->update($request->all());
        return response()->json($punto, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/puntos/{id}",
     *     summary="Delete punto by ID",
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
        Punto::destroy($id);
        return response()->json(null, 204);
    }
}
