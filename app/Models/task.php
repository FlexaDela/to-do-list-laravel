<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'checked',
        'description'
    ];
    #ordenar por data
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $builder){
            $builder->orderBy('created_at','asc');
        });
    }
}
