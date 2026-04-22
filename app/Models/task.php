<?php

namespace App\Models;

use App\Enums\TaskPriority;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


#[UseFactory(TaskFactory::class)]
class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phase',
        'status',
        'description'
    ];

    protected $casts = [
        'phase' => TaskPriority::class,
        'status' => 'boolean',
    ];

    #ordenar por data
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $builder){
            $builder->orderBy('created_at','asc');
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subTask(): HasMany
    {
        return $this->hasMany(task::class);
    }
}
