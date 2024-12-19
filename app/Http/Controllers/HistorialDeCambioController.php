<?php

namespace App\Http\Controllers;

use App\Models\HistorialDeCambio;
use Illuminate\Http\Request;


class HistorialDeCambioController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/historial-de-cambios",
     *     summary="Get list of historial de cambios",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return HistorialDeCambio::all();
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
     *     path="/api/historial-de-cambios",
     *     summary="Create a new historial de cambio",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Tabla", "Accion", "Fecha", "Usuario", "Detalle"},
     *             @OA\Property(property="Tabla", type="string", example="Tabla A"),
     *             @OA\Property(property="Accion", type="string", example="Insert"),
     *             @OA\Property(property="Fecha", type="string", format="datetime", example="2023-01-01 12:00:00"),
     *             @OA\Property(property="Usuario", type="string", example="Usuario A"),
     *             @OA\Property(property="Detalle", type="string", example="{}")
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
        $historialDeCambio = HistorialDeCambio::create($request->all());
        return response()->json($historialDeCambio, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/historial-de-cambios/{id}",
     *     summary="Get historial de cambio by ID",
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
        return HistorialDeCambio::findOrFail($id);
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
     *     path="/api/historial-de-cambios/{id}",
     *     summary="Update historial de cambio by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Tabla", "Accion", "Fecha", "Usuario", "Detalle"},
     *             @OA\Property(property="Tabla", type="string", example="Tabla A"),
     *             @OA\Property(property="Accion", type="string", example="Insert"),
     *             @OA\Property(property="Fecha", type="string", format="datetime", example="2023-01-01 12:00:00"),
     *             @OA\Property(property="Usuario", type="string", example="Usuario A"),
     *             @OA\Property(property="Detalle", type="string", example="{}")
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
        $historialDeCambio = HistorialDeCambio::findOrFail($id);
        $historialDeCambio->update($request->all());
        return response()->json($historialDeCambio, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/historial-de-cambios/{id}",
     *     summary="Delete historial de cambio by ID",
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
        HistorialDeCambio::destroy($id);
        return response()->json(null, 204);
    }
}
