<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Campos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'title',
        'description',
        'priority',
        'due_date',
        'is_completed',
    ];

    /**
     * Conversões automáticas de tipos
     */
    protected $casts = [
        'due_date' => 'date',
        'is_completed' => 'boolean',
    ];
}
