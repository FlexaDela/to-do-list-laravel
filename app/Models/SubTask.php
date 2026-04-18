<?php

namespace App\Models;

use App\Enums\SubTask as EnumsSubTask;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubTask extends Model
{
    protected $fillable = [
        'name',
        'status',
        'checked',
        'description'
        ];

    protected $casts = [
        'status' => EnumsSubTask::class,
        'checked' => 'boolean',
    ];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $builder){
            $builder->orderBy('created_at','asc');
        });
    } 

    public function task(): BelongsTo
    {
        return $this->belongsTo(SubTask::class);
    }
}
