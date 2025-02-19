<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

/**
 *
 *
 * @OA\Server(url="http://swagger.local")
*/

class TaskController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks;

        return response()->json($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

        public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $request['user_id'] = $user_id;

        $validated = $request->validate([
            'user_id' => 'required',
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'fecha_vencimiento' => 'required|string|max:50',
            'status' => 'required|boolean'
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $validated = $request->validate([
            'titulo' => 'sometimes|required|string|max:100',
            'descripcion' => 'sometimes|required|string|max:255',
            'fecha_vencimiento' => 'sometimes|required|string|max:50',
            'status' => 'sometimes|required|boolean'
        ]);

        $task->update($validated);

        return response()->json([
            'message' => 'Tarea actualizada correctamente',
            'task' => $task
        ], 200);
    }

        public function destroy($id)
    {
        $task = Task::find($id);
        try {

            // Validar que el ID sea numérico
            if (!is_numeric($id)) {
                return response()->json([
                    'message' => 'El ID de la tarea debe ser numérico'
                ], 400);
            }

            // Buscar la tarea
            $task = Task::find($id);

            // Verificar si la tarea existe
            if (!$task) {
                return response()->json([
                    'message' => 'No se encontró la tarea especificada'
                ], 404);
            }

            // Verificar si el usuario es el propietario de la tarea
            if ($task->user_id !== Auth::id()) {
                return response()->json([
                    'message' => 'No está autorizado para eliminar esta tarea'
                ], 403);
            }

            // Intentar eliminar la tarea
            if ($task->delete()) {
                return response()->json([
                    'message' => 'Tarea eliminada correctamente'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Error al eliminar la tarea'
                ], 500);
            }

        } catch (\Exception $e) {
            // Log del error para el administrador

            return response()->json([
                'message' => 'Ha ocurrido un error al procesar la solicitud'
            ], 500);
        }
    }
}
