<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'completed_at',
        'kanban_id',
        'order'
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'datetime'
        ];
    }

    public function kanban()
    {
        return $this->belongsTo(Kanban::class);
    }
}
