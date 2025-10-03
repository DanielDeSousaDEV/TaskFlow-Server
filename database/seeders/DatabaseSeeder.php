<?php

namespace Database\Seeders;

use App\Models\Kanban;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $QUANTITY_OF_TASKS = 10;

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $kanban = Kanban::factory()->create([
            'user_id' => $user->id
        ]);

        for ($i=0; $i < $QUANTITY_OF_TASKS; $i++) { 
            Task::factory()->create([
                'kanban_id' => $kanban->id
            ]);
        }
    }
}
