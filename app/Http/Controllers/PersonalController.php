<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;


class PersonalController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/personal",
     *     summary="Get list of personal",
     *      tags={"personal"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Personal::all();
    }

    /**
     * @OA\Post(
     *     path="/api/personal",
     *     summary="Create a new personal",
     *      tags={"personal"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "RolId", "EquipoId"},
     *             @OA\Property(property="Nombre", type="string", example="John Doe"),
     *             @OA\Property(property="RolId", type="integer", example=1),
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
        $personal = Personal::create($request->all());
        return response()->json($personal, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/personal/{id}",
     *     summary="Get personal by ID",
     *      tags={"personal"},
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
        return Personal::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/personal/{id}",
     *     summary="Update personal by ID",
     *      tags={"personal"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "RolId", "EquipoId"},
     *             @OA\Property(property="Nombre", type="string", example="John Doe"),
     *             @OA\Property(property="RolId", type="integer", example=1),
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
        $personal = Personal::findOrFail($id);
        $personal->update($request->all());
        return response()->json($personal, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/personal/{id}",
     *     summary="Delete personal by ID",
     *      tags={"personal"},
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
        Personal::destroy($id);
        return response()->json(null, 204);
    }
}
