<?php

namespace App\Http\Controllers;

use App\Models\Circuito;
use Illuminate\Http\Request;


class CircuitoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/circuitos",
     *     summary="Get list of circuitos",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Circuito::all();
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
     *     path="/api/circuitos",
     *     summary="Create a new circuito",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Ubicacion", "Longitud"},
     *             @OA\Property(property="Nombre", type="string", example="Circuito A"),
     *             @OA\Property(property="Ubicacion", type="string", example="Ubicacion A"),
     *             @OA\Property(property="Longitud", type="number", format="float", example=5.5)
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
        $circuito = Circuito::create($request->all());
        return response()->json($circuito, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/circuitos/{id}",
     *     summary="Get circuito by ID",
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
        return Circuito::findOrFail($id);
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
     *     path="/api/circuitos/{id}",
     *     summary="Update circuito by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Ubicacion", "Longitud"},
     *             @OA\Property(property="Nombre", type="string", example="Circuito A"),
     *             @OA\Property(property="Ubicacion", type="string", example="Ubicacion A"),
     *             @OA\Property(property="Longitud", type="number", format="float", example=5.5)
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
        $circuito = Circuito::findOrFail($id);
        $circuito->update($request->all());
        return response()->json($circuito, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/circuitos/{id}",
     *     summary="Delete circuito by ID",
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
        Circuito::destroy($id);
        return response()->json(null, 204);
    }
}
