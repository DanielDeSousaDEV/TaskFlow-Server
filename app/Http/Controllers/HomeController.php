<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use App\TaskStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

            $user->load('kanban');

            $kanban = $user->kanban;

            //Se por algum acaso o usuário não tiver um kanban
            if (!$kanban) {
                $kanban = Kanban::create([
                    'user_id' => $user->id
                ]);
            }

            //Formatação dos dados para o frontend
            $columns = [];

            foreach (TaskStatusEnum::values() as $index => $status) {
                $tasks = $kanban->tasks
                    ->filter(fn ($task) => $task->status === $status)
                    ->makeHidden(['created_at', 'updated_at'])
                    ->values();

                $columns[] = [
                    'id' => $index + 1,
                    'title' => $status,
                    'cards' => $tasks
                ];
            }


            return response([
                'success' => true,
                'message' => 'kanban carregado com sucesso',
                'data' => [
                    'columns' => $columns
                ]
            ]);
            
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }
}
