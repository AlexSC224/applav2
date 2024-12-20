<?php

namespace App\Http\Controllers;

use App\Models\Patrocinador;
use Illuminate\Http\Request;


class PatrocinadorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/patrocinadores",
     *     summary="Get list of patrocinadores",
     *      tags={"patrocinadores"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Patrocinador::all();
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
     *     path="/api/patrocinadores",
     *     summary="Create a new patrocinador",
     *       tags={"patrocinadores"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Pais"},
     *             @OA\Property(property="Nombre", type="string", example="Patrocinador A"),
     *             @OA\Property(property="Pais", type="string", example="Pais A")
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
        $patrocinador = Patrocinador::create($request->all());
        return response()->json($patrocinador, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/patrocinadores/{id}",
     *     summary="Get patrocinador by ID",
     *       tags={"patrocinadores"},
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
        return Patrocinador::findOrFail($id);
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
     *     path="/api/patrocinadores/{id}",
     *     summary="Update patrocinador by ID",
     *       tags={"patrocinadores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Pais"},
     *             @OA\Property(property="Nombre", type="string", example="Patrocinador A"),
     *             @OA\Property(property="Pais", type="string", example="Pais A")
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
        $patrocinador = Patrocinador::findOrFail($id);
        $patrocinador->update($request->all());
        return response()->json($patrocinador, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/patrocinadores/{id}",
     *     summary="Delete patrocinador by ID",
     *       tags={"patrocinadores"},
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
        Patrocinador::destroy($id);
        return response()->json(null, 204);
    }
}
