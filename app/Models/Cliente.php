<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $collection = 'clientes';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cidade_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
