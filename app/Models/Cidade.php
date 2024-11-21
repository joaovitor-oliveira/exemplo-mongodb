<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use SoftDeletes;

    protected $collection = 'cidades';

    protected $fillable = [
        'nome',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
