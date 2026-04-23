<?php

namespace App\Models;

use App\Enums\SubTaskPriority;
use Database\Factories\SubTaskFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UseFactory(SubTaskFactory::class)]

class SubTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phase',
        'status',
        ];

    protected $casts = [
        'phase' => SubTaskPriority::class,
        'status' => 'boolean',
    ];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $builder){
            $builder->orderBy('created_at','asc');
        });
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(task::class);
    }
}
