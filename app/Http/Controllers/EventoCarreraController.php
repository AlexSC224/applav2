<?php

namespace App\Http\Controllers;

use App\Models\EventosCarrera;
use Illuminate\Http\Request;


class EventoCarreraController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/eventos-carreras",
     *     summary="Get list of eventos carreras",
     *      tags={"carreras"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return EventosCarrera::all();
    }

    /**
     * @OA\Post(
     *     path="/api/eventos-carreras",
     *     summary="Create a new evento carrera",
     *      tags={"carreras"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"EventoId", "CarreraId"},
     *             @OA\Property(property="EventoId", type="integer", example=1),
     *             @OA\Property(property="CarreraId", type="integer", example=1)
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
        $eventoCarrera = EventosCarrera::create($request->all());
        return response()->json($eventoCarrera, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/eventos-carreras/{id}",
     *     summary="Get evento carrera by ID",
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
        return EventosCarrera::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/eventos-carreras/{id}",
     *     summary="Update evento carrera by ID",
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
     *             required={"EventoId", "CarreraId"},
     *             @OA\Property(property="EventoId", type="integer", example=1),
     *             @OA\Property(property="CarreraId", type="integer", example=1)
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
        $eventoCarrera = EventosCarrera::findOrFail($id);
        $eventoCarrera->update($request->all());
        return response()->json($eventoCarrera, 200);
    }

    public function destroy($id)
    {
        EventosCarrera::destroy($id);
        return response()->json(null, 204);
    }
}
