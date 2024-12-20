<?php

namespace App\Http\Controllers;

use App\Models\EventoEspecial;
use Illuminate\Http\Request;


class EventoEspecialController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/eventos-especiales",
     *     summary="Get list of eventos especiales",
     *      tags={"eventos especiales"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return EventoEspecial::all();
    }

    /**
     * @OA\Post(
     *     path="/api/eventos-especiales",
     *     summary="Create a new evento especial",
     *      tags={"eventos especiales"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Fecha", "Descripcion"},
     *             @OA\Property(property="Nombre", type="string", example="Evento A"),
     *             @OA\Property(property="Fecha", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="Descripcion", type="string", example="Descripción del evento")
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
        $eventoEspecial = EventoEspecial::create($request->all());
        return response()->json($eventoEspecial, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/eventos-especiales/{id}",
     *     summary="Get evento especial by ID",
     *      tags={"eventos especiales"},
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
        return EventoEspecial::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/eventos-especiales/{id}",
     *     summary="Update evento especial by ID",
     *      tags={"eventos especiales"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"Nombre", "Fecha", "Descripcion"},
     *             @OA\Property(property="Nombre", type="string", example="Evento A"),
     *             @OA\Property(property="Fecha", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="Descripcion", type="string", example="Descripción del evento")
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
        $eventoEspecial = EventoEspecial::findOrFail($id);
        $eventoEspecial->update($request->all());
        return response()->json($eventoEspecial, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/eventos-especiales/{id}",
     *     summary="Delete evento especial by ID",
     *      tags={"eventos especiales"},
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
        EventoEspecial::destroy($id);
        return response()->json(null, 204);
    }
}
