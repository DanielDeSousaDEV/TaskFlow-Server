<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Kanban;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    function index()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response([
                    'success' => false,
                    'message' => 'Usuário não está logado',
                ], 401);
            }

            $tasks = Task::query()
                ->whereHas('kanban', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                })
                ->get();

            return response([
                'success' => true,
                'message' => 'Tarefas listadas com sucesso',
                'data' => $tasks
            ]);
            
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }

    function show($id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return response([
                    'success' => false,
                    'message' => 'Não foi possível achar a tarefa',
                ], 404);
            }

            $user = Auth::user();

            if (!$user) {
                return response([
                    'success' => false,
                    'message' => 'Usuário não está logado',
                ], 401);
            }

            $user->load('kanban');
            $userKanbanId = $user->kanban->id ?? 0;
            $taskKanbanId = $task->kanban()->first()->id;

            if ($userKanbanId !== $taskKanbanId) {
                return response([
                    'success' => false,
                    'message' => 'Esta task não pertece a esse usuário',
                ], 403);
            }

            return response([
                'success' => true,
                'message' => 'Tarefas encontrada com sucesso',
                'data' => $task
            ]);

        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }
    
    function store(StoreTaskRequest $request)
    {
        try {
            $validatedData = $request->validated();
        
            $user = Auth::user();

            if (!$user) {
                return response([
                    'success' => false,
                    'message' => 'Usuário não está logado',
                ], 401);
            }

            $user->load('kanban');

            $kanban = $user->kanban;

            //Se por algum acaso o usuário não tiver um kanban
            if (!$kanban) {
                $kanban = Kanban::create([
                    'user_id' => $user->id
                ]);
            }

            $task = Task::create([
                ...$validatedData,
                'kanban_id' => $kanban->id
            ]);
            
            return response([
                'success' => true,
                'message' => 'Tarefa criada com sucesso',
                'data' => $task
            ]);

        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'e' => $th,
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }

    function update(UpdateTaskRequest $request, $id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return response([
                    'success' => false,
                    'message' => 'Não foi possível achar a tarefa',
                ], 404);
            }

            $validatedData = $request->validated();

            $user = Auth::user();

            if (!$user) {
                return response([
                    'success' => false,
                    'message' => 'Usuário não está logado',
                ], 401);
            }

            $user->load('kanban');
            $userKanbanId = $user->kanban->id ?? 0;
            $taskKanbanId = $task->kanban()->first()->id;

            if ($userKanbanId !== $taskKanbanId) {
                return response([
                    'success' => false,
                    'message' => 'Esta task não pertece a esse uauário',
                ], 403);
            }

            $task->update($validatedData);

            return response([
                'success' => true,
                'message' => 'Tarefas atualizada com sucesso',
                'data' => $task
            ]);


        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'e' => $th->getFile(),
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }

    function destroy($id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return response([
                    'success' => false,
                    'message' => 'Não foi possível achar a tarefa',
                ], 404);
            }

            $user = Auth::user();

            if (!$user) {
                return response([
                    'success' => false,
                    'message' => 'Usuário não está logado',
                ], 401);
            }

            $user->load('kanban');
            $userKanbanId = $user->kanban->id ?? 0;
            $taskKanbanId = $task->kanban()->first()->id;

            if ($userKanbanId !== $taskKanbanId) {
                return response([
                    'success' => false,
                    'message' => 'Esta task não pertece a esse uauário',
                ], 403);
            }

            $task->delete();

            return response([
                'success' => true,
                'message' => 'Tarefas deletada com sucesso',
                'data' => $task
            ]);

        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'e' => $th->getMessage(),
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }
}
