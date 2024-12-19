<?php

namespace App\Http\Controllers;

use App\Models\Constructor;
use Illuminate\Http\Request;


class ConstructorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/constructores",
     *     summary="Get list of constructores",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Constructor::all();
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
     *     path="/api/constructores",
     *     summary="Create a new constructor",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Pais"},
     *             @OA\Property(property="Nombre", type="string", example="Constructor A"),
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
        $constructor = Constructor::create($request->all());
        return response()->json($constructor, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/constructores/{id}",
     *     summary="Get constructor by ID",
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
        return Constructor::findOrFail($id);
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
     *     path="/api/constructores/{id}",
     *     summary="Update constructor by ID",
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
     *             @OA\Property(property="Nombre", type="string", example="Constructor A"),
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
        $constructor = Constructor::findOrFail($id);
        $constructor->update($request->all());
        return response()->json($constructor, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/constructores/{id}",
     *     summary="Delete constructor by ID",
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
        Constructor::destroy($id);
        return response()->json(null, 204);
    }
}
