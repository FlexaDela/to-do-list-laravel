<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'checked',
        'description'
    ];
    
    protected $casts = [
        'status' => TaskStatus::class,
        'checked' => 'boolean',
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
}
