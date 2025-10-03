<?php

namespace App;

enum TaskStatusEnum: string
{
    CASE TODO = 'todo';
    CASE WORKING = 'working';
    CASE COMPLETED = 'completed';

    // Retorna todos os valores do enum em array
    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
